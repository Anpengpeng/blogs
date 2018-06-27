<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
//        $students = DB::table('student')->orderby('action_date', 'desc')->paginate(10);
        $students = Student::orderBy('action_date', 'desc')->paginate(10);
//        print_r($students->toSql());
        return view('student.index', ['students' => $students]);
    }

    public function add()
    {
        return view('student.add');
    }

    public function update(Request $request, $id)
    {
        $student = DB::table('student')->where('id', $id)->first();

        if ($request->isMethod('POST')) {
            $data = $request->input('Student');
            $ret = DB::table('student')
                ->where('id', $data['id'])
                ->update([
                    'name' => htmlspecialchars($data['name']),
                    'age' => $data['age'],
                    'sex' => $data['sex']
                ]);
            if ($ret) {
                Session::put('success', '修改成功' . $id);
                return redirect('student/index')->with('sueccess', '修改成功' . $id);
            } else {
                Session::put('error', '修改失败');
                return redirect()->back()->with('error', '修改失败');
            }

        }

        return view('student.update', ['student' => $student]);
    }

    public function delete($id)
    {
        $student = DB::table('student')->where('id', $id)->delete();
        if ($student) {
            Session::put('success', '删除成功' . $id);
            return redirect('student/index');
        } else {
            Session::put('error', '删除失败' . $id);
            return redirect()->back();
        }
    }

    public function addHandle(Request $request)
    {
        //判断是否为post提交
        if ($request->isMethod('POST')) {
            $data = $request->input('Student');
            $ret = DB::table('student')
                ->insert([
                    [
                        'name' => htmlspecialchars($data['name']),
                        'age' => $data['age'],
                        'sex' => $data['sex'],
                        'action_date' => time()
                    ]
                ]);
            if ($ret) {
                Session::put('success', '添加成功');
                return redirect('student/index');
            } else {
                Session::put('error', '添加失败');
                return redirect()->back()->with('error', '添加失败');
            }
        }
    }

    //文件上传
    public function upload(Request $request)
    {

        if ($request->isMethod('POST')) {
            $file = $request->file('source');

            //文件是否上传成功
            if ($file->isValid()) {
                //原文件名
                $orgName = $file->getClientOriginalName();
                //拓展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

                $a = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
                dd($a);

            }

        }

        return view('student.upload');
    }
}
