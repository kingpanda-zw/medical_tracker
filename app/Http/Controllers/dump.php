                $employee_id = Input::get('employee_id');
                $medical_ids = Input::get('medical_id');
                $last_exam_dates = Input::get('last_exam');
                $due_exam_dates = Input::get('due_exam');
                $id = Input::get('id');
                $medical_status = 1;

               
                $result = array_map(function($id, $medical_id, $last_exam, $due_exam) {
                    return array_combine(
                        ['id','medical_id', 'last_exam', 'due_exam'], [$id, $medical_id, $last_exam, $due_exam]);
                }, $id, $medical_ids, $last_exam_dates, $due_exam_dates);

                

                $results = json_encode($result);
                // echo $results;

                $array = json_decode($results, true);
                foreach($array as $row){

                     $employee_medical_update = EmployeeMedical::where('id', $row["id"])->update([
                        'employee_id' => $employee_id,
                        'medical_id' => $row["medical_id"],
                        'last_exam' => $row["last_exam"],
                        'due_exam' => $row["due_exam"],
                    ]);

                }