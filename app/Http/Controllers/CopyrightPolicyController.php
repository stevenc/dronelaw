<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Storage;

use App\Company;

use App\CopyRightPolicy;

use App\Address;

use DB;


class CopyrightPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('copyright_policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        
        $company_id = $user->company->id;

        $company = Company::find($company_id);

        $options_dmca = (int) $request->input('options_dmca');

        $copyright_policy = new CopyrightPolicy(['is_own_dmca' => $options_dmca, 'completed' => 1]);

        $company->copyrightPolicy()->save($copyright_policy);

        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $copyright_policy = CopyRightPolicy::find($id);

        return view('copyright_policy.edit', compact('copyright_policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $options_dmca = (int) $request->input('options_dmca');

        DB::table('copyright_policies')
          ->where('id', $id)
          ->update(['is_own_dmca' => $options_dmca,
            'completed' => 1
            ]);

      return redirect('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(Request $request)
    {
        $user = $request->user();
        $company_id = $user->company->id;
        $company = Company::find($company_id);
        $copyright_policy = $company->copyrightPolicy()->first();
        $company_address = DB::table('addresses')
                             ->join('states', 'addresses.desired_state', '=', 'states.id')
                             ->join('states as s1', 'addresses.company_state', '=', 's1.id')
                             ->select('addresses.address_1', 'addresses.address_2', 'addresses.city',
                                'addresses.zip', 'addresses.preferred_email', 'states.abbreviation as desired_state',
                                's1.abbreviation as company_state')
                             ->where('addresses.company_id', $company_id)
                             ->first();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle($company->domain);
        $section->addTitle('Copyright Policy');
        $section->addTextBreak(2);
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            'The ' . $company->domain . ' website (“Website”) and its associated content and services are © 2016 ' . $company->name . '.');

        $section->addTextBreak(1);

        $section->addText($company->name . ' respects the intellectual property rights of others and is committed to '
            .'helping third parties protect their rights. Users are prohibited from posting content that violates another party\'s '
            .'intellectual property rights. Unless otherwise stated, this Website and all content within this site are the property of '
            . $company->name . ' as owner or authorized licensee and are protected by copyright and other intellectual property laws.');

        $section->addTextBreak(1);

        $section->addText('By using this Website, you agree that you will not use any devices, software or automated programs such as '
            .'spiders, crawlers or robots to systematically index, aggregate, download, harvest or re-publish any of its content or information.');

        $section->addTextBreak(1);

        $section->addText('If you believe that a user of the Website has infringed upon your copyright rights, please provide '
            . $company->name . ' with a notice of copyright infringement in compliance with § 512 of the Digital Millennium Copyright Act. Once '
            . $company->name . ' receives a notice of copyright infringement in compliance with § 512, we will act with commercial reasonableness '
            . 'to remove or disable access to the allegedly infringing content. '. $company->name . ' will also make a good faith attempt to notify the '
            . 'owner or uploader of the allegedly infringing content. The owner or uploader may respond to [Company Name] with a counter-notification '
            . 'if they believe the content subject to a notice of copyright infringement was not infringing any intellectual property rights.');

        $section->addTextBreak(1);

        $section->addText('The notice of copyright infringement must be in compliance with § 512 of the Digital Millennium Copyright Act and must also contain the following:');

        $section->addTextBreak(1);

        $section->addListItem('1. The physical or electronic signature of a person authorized to act on behalf of the copyright owner;', 0, null, 'decimal');

        $section->addListItem('2. Identification of the copyrighted work(s) alleged to have been infringed;', 0, null, 'decimal');

        $section->addListItem('3. The location of the copyrighted work(s) on the Website;', 0, null, 'decimal');

        $section->addListItem('4. Your contact information, such as an address, telephone, fax number, or email address;', 0, null, 'decimal');

        $section->addListItem('5. A statement that you have a good faith belief that the use of the allegedly infringing content is not authorized by the copyright owner, its agent, or the law; and', 0, null, 'decimal');

        $section->addListItem('6. A statement, under penalty of perjury, that the information in the notification is accurate and that you are authorized to act on behalf of the copyright owner.', 0, null, 'decimal');

        $section->addPageBreak();

        $section->addText('Conversely, if you are a Website user that believes that content subject to a notice of copyright infringement is not actually infringing, you may submit a counter-notification. The counter-notification must contain the following:');

        $section->addTextBreak(1);

        $section->addListItem('1. Identification of the specific materials that have been removed from the Website;');

        $section->addListItem('2. Your contact information, such as an address, telephone, fax number, or email address;');

        $section->addListItem('3. A statement, under penalty of perjury, that you have a good faith belief that the content was removed as a result of mistake or misidentification; ');

        $section->addListItem('4. A statement that you consent to the jurisdiction of the federal district court in which your address is located or, if you are outside of the US, that you consent to the jurisdiction of the federal courts located in'
            . $company_address->desired_state . ';');

        $section->addListItem('5. A statement that you will accept service of process from the notifying party; and');

        $section->addListItem('6. Your physical or electronic signature.');

        $section->addTextBreak(1);

        $section->addText('Notifications of copyright infringement and counter-notifications may be submitted to:');

        $section->addTextBreak(1);

        if ($copyright_policy->is_own_dmca == 0) {
            $section->addText('Traverse Legal DMCA Agent, PLC, 810 Cottageview Drive, G20 Traverse City, MI 49684, with a copy to dmcaagent@traverselegal.com');
        } else {
            if (isset($company_address->address_2) && !empty($company_address->address_2)) {
                $section->addText($company->name . '’s Copyright Agent: ' . $company->name . ', '. $company_address->address_1 . ', ' 
                    . $company_address->address_2 . ' ' . $company_address->city . ', ' . $company_address->company_state . ' '
                    . $company_address->zip . ', with a copy via email to  ' . $company_address->preferred_email);
            } else {
                $section->addText($company->name . '’s Copyright Agent: ' . $company->name . ', '. $company_address->address_1 . ', ' 
                    . $company_address->city . ', ' . $company_address->company_state . ' '
                    . $company_address->zip . ', with a copy via email to  ' . $company_address->preferred_email);
            }
        }

        $directory = 'company-' . (string) $company->id;

        Storage::makeDirectory($directory); 
        $path = storage_path('app/'. $directory . 'copyright-policy.rtf');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
        $objWriter->save($path, 'RTF', true);

        return response()->download($path);

    }
}
