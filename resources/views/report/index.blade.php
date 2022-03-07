@extends('layout/template')
@section('content')

<div class="row">
    <table style="width: 400px; font-size: 12px;">
        <tr >
            <td style="border: 1px solid silver">Company's Name</td>
             <td colspan="2" style="border: 1px solid silver">
                    <table style="height: 52px;width: 273px;">
                            <tr>
                                <td style="border-right: 1px solid silver;">Branch's Name</td>
                                 <td>Staff's Name</td>
                            </tr>
                    </table>

             </td>

        </tr>
<?php
   // $data = DB::table('company')->orderBy('company_id','ASC')


$companydata = DB::table('company')->orderBy('company_id','ASC')->get();
foreach ($companydata as $comdata) 
{
    $companyid = $comdata->company_id;
?>
        <tr>
            <td style="border-bottom:1px solid #fff; width: 150px;background-color: silver; border-right: 1px solid #fff" ><?php echo $comdata->company_name; ?></td>
            <td style="width: 150px;background-color: silver;border-right: 1px solid #fff; border-bottom: 0px solid #fff">
                <?php
                $branchdata = DB::table('branch')->where('company_id',$companyid)->orderBy('branch_id','ASC')->get();
                foreach ($branchdata as $brndata) 
                {
                    $branchid = $brndata->branch_id;
                ?>
                    <table style="width: 300px">
                            <tr style="border-bottom: 1px solid silver;">
                                <td style="width: 150px; border-right: 1px solid #fff; border-bottom: 1px solid #fff">
                                  <?php echo $brndata->branch_name; ?> 

                                </td>
                                <td style="width: 150px; background-color: silver; border-right: 1px solid #fff">
                                    <?php
                                    $staffdata = DB::table('staff')
                                    ->where('company_id',$companyid)
                                    ->where('branch_id',$branchid)
                                    ->orderBy('staff_id','ASC')
                                    ->get();
                                    foreach ($staffdata as $staffrow) 
                                    {
                                    ?>
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="border-top:1px solid silver; border-bottom: 1px solid #fff;"><?php echo $staffrow->staff_name ?></td>
                                            </tr>
                                        </table>


                                    <?php 
                                    }
                                    ?>


                                </td>
                            </tr>
                    </table>    
                <?php
                }
                ?>               

            </td>

        </tr>  
<?php
}

?>
</table>
</div>

    

@endsection