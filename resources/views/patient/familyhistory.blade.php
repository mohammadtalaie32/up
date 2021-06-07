@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ route('updatefamilyhistory', $data->id) }}" method="get">
        
       	<input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
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
                    <center>
                    
                            <input type="hidden" name="submit" value="true">
                            <table width="80%" cellspacing="0" cellpadding="5" border="0">
                                <tbody>
                                    <tr>
                                        <td colspan="13"
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            <font size="+2">Family History</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            &nbsp;</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Back</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Heart</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Stroke</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Cancer</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Diabetes</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            High BP</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Arthritis</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            High Cholesterol</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Osteoporosis</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Thyroid</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Good Health</td>
                                        <td
                                            style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                            Unknown</td>
                                    </tr>
                                    <tr bgcolor="#f1f1f1">
                                        <td>Mother:</td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Back"
                                                {{ in_array('Back', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Heart"
                                                {{ in_array('Heart', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Stroke"
                                                {{ in_array('Stroke', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Cancer"
                                                {{ in_array('Cancer', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Diabetes"
                                                {{ in_array('Diabetes', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="High BP"
                                                {{ in_array('High BP', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Mother[]"
                                                value="Arthritis"
                                                {{ in_array('Arthritis', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]"
                                                value="High Cholesterol"
                                                {{ in_array('High Cholesterol', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Osteoporosis"
                                                {{ in_array('Osteoporosis', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Thyroid"
                                                {{ in_array('Thyroid', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Mother[]"
                                                value="Good Health"
                                                {{ in_array('Good Health', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Mother[]" value="Unknown"
                                                {{ in_array('Unknown', $mother) ? 'checked' : ' ' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Father:</td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Back"
                                                {{ in_array('Back', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Father[]"
                                                value="Heart"
                                                {{ in_array('Heart', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Father[]"
                                                value="Stroke"
                                                {{ in_array('Stroke', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Cancer"
                                                {{ in_array('Cancer', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Diabetes"
                                                {{ in_array('Diabetes', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="High BP"
                                                {{ in_array('High BP', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Father[]"
                                                value="Arthritis"
                                                {{ in_array('Arthritis', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]"
                                                value="High Cholesterol"
                                                {{ in_array('High Cholesterol', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Osteoporosis"
                                                {{ in_array('Osteoporosis', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Thyroid"
                                                {{ in_array('Thyroid', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Father[]"
                                                value="Good Health"
                                                {{ in_array('Good Health', $father) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Father[]" value="Unknown"
                                                {{ in_array('Unknown', $father) ? 'checked' : ' ' }}>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#f1f1f1">
                                        <td>Sisters:</td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Back"
                                                {{ in_array('Back', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Heart"
                                                {{ in_array('Heart', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Sisters[]"
                                                value="Stroke"
                                                {{ in_array('Stroke', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Sisters[]"
                                                value="Cancer"
                                                {{ in_array('Cancer', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Sisters[]"
                                                value="Diabetes"
                                                {{ in_array('Diabetes', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="High BP"
                                                {{ in_array('High BP', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Arthritis"
                                                {{ in_array('Arthritis', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]"
                                                value="High Cholesterol"
                                                {{ in_array('High Cholesterol', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Osteoporosis"
                                                {{ in_array('Osteoporosis', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Thyroid"
                                                {{ in_array('Thyroid', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Sisters[]"
                                                value="Good Health"
                                                {{ in_array('Good Health', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Sisters[]" value="Unknown"
                                                {{ in_array('Unknown', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brothers:</td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Back"
                                                {{ in_array('Back', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Brothers[]"
                                                value="Heart"
                                                {{ in_array('Heart', $sister) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Stroke"
                                                {{ in_array('Stroke', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Cancer"
                                                {{ in_array('Cancer', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Brothers[]"
                                                value="Diabetes"
                                                {{ in_array('Diabetes', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="High BP"
                                                {{ in_array('High BP', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Arthritis"
                                                {{ in_array('Arthritis', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]"
                                                value="High Cholesterol"
                                                {{ in_array('High Cholesterol', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]"
                                                value="Osteoporosis"
                                                {{ in_array('Osteoporosis', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Thyroid"
                                                {{ in_array('Thyroid', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Brothers[]"
                                                value="Good Health"
                                                {{ in_array('Good Health', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Brothers[]" value="Unknown"
                                                {{ in_array('Unknown', $brother) ? 'checked' : ' ' }}>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#f1f1f1">
                                        <td>Children:</td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Back"
                                                {{ in_array('Back', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Heart"
                                                {{ in_array('Heart', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Stroke"
                                                {{ in_array('Stroke', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Children[]" value="Cancer"
                                                {{ in_array('Cancer', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Diabetes"
                                                {{ in_array('Diabetes', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Children[]" value="High BP"
                                                {{ in_array('High BP', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Children[]" value="Arthritis"
                                                {{ in_array('Arthritis', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="High Cholesterol"
                                                {{ in_array('High Cholesterol', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Children[]"
                                                value="Osteoporosis"
                                                {{ in_array('High Cholesterol', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Thyroid"
                                                {{ in_array('Thyroid', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="Children[]" value="Good Health"
                                                {{ in_array('Good Healths', $children) ? 'checked' : ' ' }}>
                                        </td>
                                        <td align="center"><input type="checkbox" name="Children[]"
                                                value="Unknown"
                                                {{ in_array('Unknown', $children) ? 'checked' : ' ' }}>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#d9d9d9">
                                        <td colspan="13" style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding-top:10px;padding-bottom:10px"
											align="right">
											<button type='submit' class="btn p-0">
												<img src="{{ asset('/nlimages/savebutton.png') }}" height="25" alt="Save">
											</button>
										</td>
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
