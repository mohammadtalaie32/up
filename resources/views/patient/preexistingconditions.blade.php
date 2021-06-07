@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ route('updatepreexistingconditions', $data->id) }}" method="get">
        
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
                        <script>
                            if (window.innerWidth < 1280) {
                                if (document.getElementById('visitlist')) document.getElementById(
                                    'visitlist').style.top = '69px';
                                document.getElementById('sidebar').style.top = '72px';
                                document.getElementById('mainmenutable').style.height = '70px';
                            }

                        </script>
                        <script>
                            function affect(id) {
                                if (document.getElementById(id).value == 'mm' || document
                                    .getElementById(id).value == 'dd' || document.getElementById(id)
                                    .value == 'yyyy') {
                                    document.getElementById(id).value = '';
                                    document.getElementById(id).style.color = 'black';
                                }
                            }

                            function out(id) {
                                var theval;
                                if (id == 'month') {
                                    theval = 'mm';
                                }
                                if (id == 'day') theval = 'dd';
                                if (id == 'year') theval = 'yyyy';
                                if (document.getElementById(id).value == '') {
                                    document.getElementById(id).style.color = 'gray';
                                    document.getElementById(id).value = theval;
                                }
                            }

                            function formsubmit(thefile) {
                                document.patientinfoform.deleteimage.value = thefile;
                                document.patientinfoform.submit();
                            }

                        </script>

                     
                            <input type="hidden" name="submit" value="true">
                            <center>
                                <table width="80%" cellspacing="0" cellpadding="5">
                                    <tbody>
                                        <tr>
                                            <td colspan="4"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                                <font size="+2">Pre-Existing Conditions</font>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="ADD/ADHD"
                                                    {{ in_array('ADD/ADHD', $preexisting) ? 'checked' : ' ' }}>
                                                ADD/ADHD</td>
                                            <td>
                                                <input type="checkbox" name="preexisting[]"
                                                    value="Collagen vascular disease"
                                                    {{ in_array('Collagen vascular disease', $preexisting) ? 'checked' : ' ' }}>
                                                Collagen vascular disease
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Heart murmur"
                                                    {{ in_array('Heart murmur', $preexisting) ? 'checked' : ' ' }}>
                                                Heart murmur</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Paralysis"
                                                    {{ in_array('Paralysis', $preexisting) ? 'checked' : ' ' }}>
                                                Paralysis</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Alcohol/drug addiction"
                                                    {{ in_array('Alcohol/drug addiction', $preexisting) ? 'checked' : ' ' }}>
                                                Alcohol/drug addiction
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Constipation"
                                                    {{ in_array('Constipation', $preexisting) ? 'checked' : ' ' }}>
                                                Constipation</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Hemorrhoids"
                                                    {{ in_array('Hemorrhoids', $preexisting) ? 'checked' : ' ' }}>
                                                Hemorrhoids</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Pneumonia"
                                                    {{ in_array('Pneumonia', $preexisting) ? 'checked' : ' ' }}>
                                                Pneumonia</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Anemia"
                                                    {{ in_array('Anemia', $preexisting) ? 'checked' : ' ' }}>
                                                Anemia</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Depression/anxiety"
                                                    {{ in_array('Depression/anxiety', $preexisting) ? 'checked' : ' ' }}>
                                                Depression/anxiety</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Hepatitis"
                                                    {{ in_array('Hepatitis', $preexisting) ? 'checked' : ' ' }}>
                                                Hepatitis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Polio"
                                                    {{ in_array('Polio', $preexisting) ? 'checked' : ' ' }}>
                                                Polio</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Appenicitis"
                                                    {{ in_array('Appenicitis', $preexisting) ? 'checked' : ' ' }}>
                                                Appenicitis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Diabetes"
                                                    {{ in_array('Diabetes', $preexisting) ? 'checked' : ' ' }}>
                                                Diabetes</td>
                                            <td><input type="checkbox" name="preexisting[]" value="High blood pressue"
                                                    {{ in_array('High blood pressue', $preexisting) ? 'checked' : ' ' }}>
                                                High blood pressue</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Prostate problems"
                                                    {{ in_array('Prostate problems', $preexisting) ? 'checked' : ' ' }}>
                                                Prostate problems</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Arrythmia"
                                                    {{ in_array('Arrythmia', $preexisting) ? 'checked' : ' ' }}>
                                                Arrythmia</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Digestive Disorders"
                                                    {{ in_array('Digestive Disorders', $preexisting) ? 'checked' : ' ' }}>
                                                Digestive Disorders</td>
                                            <td><input type="checkbox" name="preexisting[]" value="High cholesterol"
                                                    {{ in_array('High cholesterol', $preexisting) ? 'checked' : ' ' }}>
                                                High cholesterol</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Reflux/ulcers"
                                                    {{ in_array('Reflux/ulcers', $preexisting) ? 'checked' : ' ' }}>
                                                Reflux/ulcers</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Arteriosclerosis"
                                                    {{ in_array('Arteriosclerosis', $preexisting) ? 'checked' : ' ' }}>
                                                Arteriosclerosis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Dizziness"
                                                    {{ in_array('Dizziness', $preexisting) ? 'checked' : ' ' }}>
                                                Dizziness</td>
                                            <td><input type="checkbox" name="preexisting[]" value="HIV/AIDS"
                                                    {{ in_array('HIV/AIDS', $preexisting) ? 'checked' : ' ' }}>
                                                HIV/AIDS</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Rheumatic fever"
                                                    {{ in_array('Rheumatic fever', $preexisting) ? 'checked' : ' ' }}>
                                                Rheumatic fever</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Arthiritis"
                                                    {{ in_array('Arthiritis', $preexisting) ? 'checked' : ' ' }}>
                                                Arthiritis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Eating Disorder"
                                                    {{ in_array('Eating Disorder', $preexisting) ? 'checked' : ' ' }}>
                                                Eating Disorder</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Joint/back pain"
                                                    {{ in_array('Joint/back pain', $preexisting) ? 'checked' : ' ' }}>
                                                Joint/back pain</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Scoliosis"
                                                    {{ in_array('Scoliosis', $preexisting) ? 'checked' : ' ' }}>
                                                Scoliosis</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Asthma"
                                                    {{ in_array('Asthma', $preexisting) ? 'checked' : ' ' }}>
                                                Asthma</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Emphysema"
                                                    {{ in_array('Emphysema', $preexisting) ? 'checked' : ' ' }}>
                                                Emphysema</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Kidney infections"
                                                    {{ in_array('Kidney infections', $preexisting) ? 'checked' : ' ' }}>
                                                Kidney infections</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Seizures/epilepsy"
                                                    {{ in_array('Seizures/epilepsy', $preexisting) ? 'checked' : ' ' }}>
                                                Seizures/epilepsy</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Backaches"
                                                    {{ in_array('Backaches', $preexisting) ? 'checked' : ' ' }}>
                                                Backaches</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Epilepsy"
                                                    {{ in_array('Epilepsy', $preexisting) ? 'checked' : ' ' }}>
                                                Epilepsy</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Kidney stones"
                                                    {{ in_array('Kidney stones', $preexisting) ? 'checked' : ' ' }}>
                                                Kidney stones</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Sexual dysfunction"
                                                    {{ in_array('Sexual dysfunction', $preexisting) ? 'checked' : ' ' }}>
                                                Sexual dysfunction</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Bleeding disorder"
                                                    {{ in_array('Bleeding disorder', $preexisting) ? 'checked' : ' ' }}>
                                                Bleeding disorder</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Fatigue"
                                                    {{ in_array('Fatigue', $preexisting) ? 'checked' : ' ' }}>
                                                Fatigue</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Liver disease/problems"
                                                    {{ in_array('Liver disease/problems', $preexisting) ? 'checked' : ' ' }}>
                                                Liver disease/problems</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Sickle cell"
                                                    {{ in_array('Sickle cell', $preexisting) ? 'checked' : ' ' }}>
                                                Sickle cell</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Blood clots"
                                                    {{ in_array('Blood clots', $preexisting) ? 'checked' : ' ' }}>
                                                Blood clots
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Female Health Challenges"
                                                    {{ in_array('Female Health Challenges', $preexisting) ? 'checked' : ' ' }}>
                                                Female Health Challenges</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Lung disease"
                                                    {{ in_array('Lung disease', $preexisting) ? 'checked' : ' ' }}>
                                                Lung disease</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Sinus trouble"
                                                    {{ in_array('Sinus trouble', $preexisting) ? 'checked' : ' ' }}>
                                                Sinus trouble</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Blood transfusions"
                                                    {{ in_array('Blood transfusions', $preexisting) ? 'checked' : ' ' }}>
                                                Blood transfusions
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Fibromyalgia"
                                                    {{ in_array('Fibromyalgia', $preexisting) ? 'checked' : ' ' }}>
                                                Fibromyalgia</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Measles"
                                                    {{ in_array('Measles', $preexisting) ? 'checked' : ' ' }}>
                                                Measles</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Stress/tension"
                                                    {{ in_array('Stress/tension', $preexisting) ? 'checked' : ' ' }}>
                                                Stress/tension</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Blurred vision"
                                                    {{ in_array('Blurred vision', $preexisting) ? 'checked' : ' ' }}>
                                                Blurred vision</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Gallbladder disease"
                                                    {{ in_array('Gallbladder disease', $preexisting) ? 'checked' : ' ' }}>
                                                Gallbladder disease</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Menstrual cramps"
                                                    {{ in_array('Menstrual cramps', $preexisting) ? 'checked' : ' ' }}>
                                                Menstrual cramps</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Stroke"
                                                    {{ in_array('Stroke', $preexisting) ? 'checked' : ' ' }}>
                                                Stroke</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Bowel problems"
                                                    {{ in_array('Bowel problems', $preexisting) ? 'checked' : ' ' }}>
                                                Bowel problems
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Genital Herpes"
                                                    {{ in_array('Genital Herpes', $preexisting) ? 'checked' : ' ' }}>
                                                Genital Herpes</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Mental disorder"
                                                    {{ in_array('Mental disorder', $preexisting) ? 'checked' : ' ' }}>
                                                Mental disorder</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Suicidal tendencies"
                                                    {{ in_array('Suicidal tendencies', $preexisting) ? 'checked' : ' ' }}>
                                                Suicidal tendencies</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Broken bones"
                                                    {{ in_array('Broken bones', $preexisting) ? 'checked' : ' ' }}>
                                                Broken bones
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Glaucoma"
                                                    {{ in_array('Glaucoma', $preexisting) ? 'checked' : ' ' }}>
                                                Glaucoma</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Migraines"
                                                    {{ in_array('Migraines', $preexisting) ? 'checked' : ' ' }}>
                                                Migraines</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Thyroid disease"
                                                    {{ in_array('Thyroid disease', $preexisting) ? 'checked' : ' ' }}>
                                                Thyroid disease</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Cancer"
                                                    {{ in_array('Cancer', $preexisting) ? 'checked' : ' ' }}>
                                                Cancer</td>
                                            <td>
                                                <input type="checkbox" name="preexisting[]" value="Gluten Intolerance"
                                                    {{ in_array('Gluten Intolerance', $preexisting) ? 'checked' : ' ' }}>
                                                Gluten Intolerance
                                            </td>
                                            <td><input type="checkbox" name="preexisting[]" value="Miscarriage"
                                                    {{ in_array('Miscarriage', $preexisting) ? 'checked' : ' ' }}>
                                                Miscarriage</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Tuberculosis"
                                                    {{ in_array('Tuberculosis', $preexisting) ? 'checked' : ' ' }}>
                                                Tuberculosis</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Carpal Tunnel"
                                                    {{ in_array('Carpal Tunnel', $preexisting) ? 'checked' : ' ' }}>
                                                Carpal Tunnel</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Goiter"
                                                    {{ in_array('Goiter', $preexisting) ? 'checked' : ' ' }}>
                                                Goiter</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Multiple Sclerosis"
                                                    {{ in_array('Multiple Sclerosis', $preexisting) ? 'checked' : ' ' }}>
                                                Multiple Sclerosis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Tumors"
                                                    {{ in_array('Tumors', $preexisting) ? 'checked' : ' ' }}>
                                                Tumors</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Cataracts"
                                                    {{ in_array('Cataracts', $preexisting) ? 'checked' : ' ' }}>
                                                Cataracts</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Gout"
                                                    {{ in_array('Gout', $preexisting) ? 'checked' : ' ' }}>
                                                Gout</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Neck pain"
                                                    {{ in_array('Neck pain', $preexisting) ? 'checked' : ' ' }}>
                                                Neck pain</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Ulcers"
                                                    {{ in_array('Ulcers', $preexisting) ? 'checked' : ' ' }}>
                                                Ulcers</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Chickenpox"
                                                    {{ in_array('Chickenpox', $preexisting) ? 'checked' : ' ' }}>
                                                Chickenpox</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Headaches"
                                                    {{ in_array('Headaches', $preexisting) ? 'checked' : ' ' }}>
                                                Headaches</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Nervousness"
                                                    {{ in_array('Nervousness', $preexisting) ? 'checked' : ' ' }}>
                                                Nervousness</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Urine discoloration"
                                                    {{ in_array('Urine discoloration', $preexisting) ? 'checked' : ' ' }}>
                                                Urine discoloration</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="preexisting[]" value="Cold Sores"
                                                    {{ in_array('Cold Sores', $preexisting) ? 'checked' : ' ' }}>
                                                Cold Sores</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Hearing Loss"
                                                    {{ in_array('Hearing Loss', $preexisting) ? 'checked' : ' ' }}>
                                                Hearing Loss</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Night Sweats"
                                                    {{ in_array('Night Sweats', $preexisting) ? 'checked' : ' ' }}>
                                                Night Sweats</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Vertigo"
                                                    {{ in_array('Vertigo', $preexisting) ? 'checked' : ' ' }}>
                                                Vertigo</td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td><input type="checkbox" name="preexisting[]" value="Colitis"
                                                    {{ in_array('Colitis', $preexisting) ? 'checked' : ' ' }}>
                                                Colitis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Heart Disease/Attacks"
                                                    {{ in_array('Heart Disease/Attacks', $preexisting) ? 'checked' : ' ' }}>
                                                Heart Disease/Attacks</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Osteoporosis"
                                                    {{ in_array('Osteoporosis', $preexisting) ? 'checked' : ' ' }}>
                                                Osteoporosis</td>
                                            <td><input type="checkbox" name="preexisting[]" value="Whooping Cough"
                                                    {{ in_array('Whooping Cough', $preexisting) ? 'checked' : ' ' }}>
                                                Whooping Cough</td>
                                        </tr>
                                        <tr bgcolor="#d9d9d9">
                                            <td colspan="4"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding-top:10px;padding-bottom:10px;"
                                                align="right"><input type="image"
                                                    src="{{ asset('/nlimages/savebutton.png') }}" height="25">
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
