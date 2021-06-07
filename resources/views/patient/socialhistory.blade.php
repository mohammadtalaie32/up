@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ route('updatesocialhistory', $data->id) }}" method="get">
        <table height="30">
            <tbody>
                <tr>
                    <td><img src="{{ asset('/images/spacer.png') }}" height="30"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" cellpadding="10 ">
            <tbody>
                <tr>
                    <td width="100%" valign="top">
                     
                            <input type="hidden" name="submit" value="true">
                            <center>
                                <table width="80%" cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                        <tr>
                                            <td colspan="8"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                                <font size="+2">Social History</font>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>&nbsp;</td>
                                            <td align="center">Daily</td>
                                            <td align="center">3x/wk</td>
                                            <td align="center">2x/wk</td>
                                            <td align="center">1x/wk</td>
                                            <td align="center">2x/mo</td>
                                            <td align="center">1x/mo</td>
                                            <td align="center">Never</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                                <b>Work</b>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Standing:</td>
                                            <td align="center"><input type="radio" name="Standing" value="Daily"
                                                    {{ $data->Standing == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Standing" value="3x/wk"
                                                    {{ $data->Standing == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Standing" value="2x/wk"
                                                    {{ $data->Standing == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Standing" value="1x/wk"
                                                    {{ $data->Standing == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Standing" value="2x/mo"
                                                    {{ $data->Standing == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Standing" value="1x/mo"
                                                    {{ $data->Standing == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Standing" value="Never"
                                                    {{ $data->Standing == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Sit_at_a_desk:</td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="Daily"
                                                    {{ $data->Sit_at_a_desk == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Sit_at_a_desk" value="3x/wk"
                                                    {{ $data->Sit_at_a_desk == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="2x/wk"
                                                    {{ $data->Sit_at_a_desk == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="1x/wk"
                                                    {{ $data->Sit_at_a_desk == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="2x/mo"
                                                    {{ $data->Sit_at_a_desk == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="1x/mo"
                                                    {{ $data->Sit_at_a_desk == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Sit_at_a_desk" value="Never"
                                                    {{ $data->Sit_at_a_desk == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#f1f1f1">
                                            <td>Work_on_a_computer:</td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="Daily"
                                                    {{ $data->Work_on_a_computer == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="3x/wk"
                                                    {{ $data->Work_on_a_computer == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="2x/wk"
                                                    {{ $data->Work_on_a_computer == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="1x/wk"
                                                    {{ $data->Work_on_a_computer == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="2x/mo"
                                                    {{ $data->Work_on_a_computer == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="1x/mo"
                                                    {{ $data->Work_on_a_computer == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_computer" value="Never"
                                                    {{ $data->Work_on_a_computer == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Work_on_a_phone:</td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_phone" value="Daily"
                                                    {{ $data->Work_on_a_phone == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_phone" value="3x/wk"
                                                    {{ $data->Work_on_a_phone == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Work_on_a_phone" value="2x/wk"
                                                    {{ $data->Work_on_a_phone == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Work_on_a_phone" value="1x/wk"
                                                    {{ $data->Work_on_a_phone == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Work_on_a_phone" value="2x/mo"
                                                    {{ $data->Work_on_a_phone == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Work_on_a_phone" value="1x/mo"
                                                    {{ $data->Work_on_a_phone == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Work_on_a_phone" value="Never"
                                                    {{ $data->Work_on_a_phone == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Moderate Heavy labor:</td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="Daily"
                                                    {{ $data->Moderate_Heavy_labor == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="3x/wk"
                                                    {{ $data->Moderate_Heavy_labor == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="2x/wk"
                                                    {{ $data->Moderate_Heavy_labor == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="1x/wk"
                                                    {{ $data->Moderate_Heavy_labor == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="2x/mo"
                                                    {{ $data->Moderate_Heavy_labor == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Moderate_Heavy_labor" value="1x/mo"
                                                    {{ $data->Moderate_Heavy_labor == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Moderate_Heavy_labor" value="Never"
                                                    {{ $data->Moderate_Heavy_labor == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stay at home:</td>
                                            <td align="center">
                                                <input type="radio" name="Stay_at_home" value="Daily"
                                                    {{ $data->Stay_at_home == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Stay_at_home" value="3x/wk"
                                                    {{ $data->Stay_at_home == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Stay_at_home" value="2x/wk"
                                                    {{ $data->Stay_at_home == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Stay_at_home" value="1x/wk"
                                                    {{ $data->Stay_at_home == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Stay_at_home" value="2x/mo"
                                                    {{ $data->Stay_at_home == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Stay_at_home" value="1x/mo"
                                                    {{ $data->Stay_at_home == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Stay_at_home" value="Never"
                                                    {{ $data->Stay_at_home == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Deliver packages:</td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="Daily"
                                                    {{ $data->Deliver_packages == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="3x/wk"
                                                    {{ $data->Deliver_packages == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="2x/wk"
                                                    {{ $data->Deliver_packages == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="1x/wk"
                                                    {{ $data->Deliver_packages == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="2x/mo"
                                                    {{ $data->Deliver_packages == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="1x/mo"
                                                    {{ $data->Deliver_packages == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Deliver_packages" value="Never"
                                                    {{ $data->Deliver_packages == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Retired:</td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="Daily"
                                                    {{ $data->Retired == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="3x/wk"
                                                    {{ $data->Retired == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="2x/wk"
                                                    {{ $data->Retired == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="1x/wk"
                                                    {{ $data->Retired == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="2x/mo"
                                                    {{ $data->Retired == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center"><input type="radio" name="Retired" value="1x/mo"
                                                    {{ $data->Retired == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Retired" value="Never"
                                                    {{ $data->Retired == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td colspan="8"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                                <b>Habits</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tobacco Smoke:</td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="Daily"
                                                    {{ $data->Tobacco_Smoke == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="3x/wk"
                                                    {{ $data->Tobacco_Smoke == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="2x/wk"
                                                    {{ $data->Tobacco_Smoke == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="1x/wk"
                                                    {{ $data->Tobacco_Smoke == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="2x/mo"
                                                    {{ $data->Tobacco_Smoke == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="1x/mo"
                                                    {{ $data->Tobacco_Smoke == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Tobacco_Smoke" value="Never"
                                                    {{ $data->Tobacco_Smoke == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Alcoholic beverages:</td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="Daily"
                                                    {{ $data->Alcoholic_beverages == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="3x/wk"
                                                    {{ $data->Alcoholic_beverages == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="2x/wk"
                                                    {{ $data->Alcoholic_beverages == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="1x/wk"
                                                    {{ $data->Alcoholic_beverages == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="2x/mo"
                                                    {{ $data->Alcoholic_beverages == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="1x/mo"
                                                    {{ $data->Alcoholic_beverages == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Alcoholic_beverages" value="Never"
                                                    {{ $data->Alcoholic_beverages == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Caffeine:</td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="Daily"
                                                    {{ $data->Caffeine == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="3x/wk"
                                                    {{ $data->Caffeine == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="2x/wk"
                                                    {{ $data->Caffeine == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="1x/wk"
                                                    {{ $data->Caffeine == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="2x/mo"
                                                    {{ $data->Caffeine == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="1x/mo"
                                                    {{ $data->Caffeine == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Caffeine" value="Never"
                                                    {{ $data->Caffeine == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><b>Exercise:</b></td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="Daily"
                                                    {{ $data->Exercise == 'Daily' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="3x/wk"
                                                    {{ $data->Exercise == '3x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="2x/wk"
                                                    {{ $data->Exercise == '2x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="1x/wk"
                                                    {{ $data->Exercise == '1x/wk' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="2x/mo"
                                                    {{ $data->Exercise == '2x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="1x/mo"
                                                    {{ $data->Exercise == '1x/mo' ? 'checked' : '' }}>
                                            </td>
                                            <td align="center">
                                                <input type="radio" name="Exercise" value="Never"
                                                    {{ $data->Exercise == 'Never' ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#d9d9d9">
                                            <td colspan="8"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding-top:10px;padding-bottom:10px"
                                                align="right"><input type="image"
                                                    src="{{ asset('/nlimages/savebutton.png') }}" height="25"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
