<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Course;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = DB::table('quizzes')->where('user_id', auth()->id())->paginate();
        return view('card.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('card.create');
    }

    /** 
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
   
    $validatedData = $request->validate([
        'course_id' => 'required',
        'definition' => 'required',
        'mota' => 'required',
        // Thêm các quy tắc xác thực khác tùy thuộc vào yêu cầu của bạn
    ]);
    $definitions = $request->input('definition');
    $motas = $request->input('mota');

    $user = Auth::user(); // Lấy thông tin người dùng hiện tại
    $course = Course::all();
    // Loop qua từng phần tử và lưu vào cơ sở dữ liệu
    for ($i = 0; $i < count($definitions); $i++) {
        // Lưu trữ hình ảnh vào public/uploads
        if ($request->hasFile('imageInput')) {
            // Lưu ảnh vào thư mục 'public/uploads'
            $imagePath = $request->file('imageInput')[$i]->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        $quizData = array(
            'course_id' => $course->id, 
            'user_id' => auth()->id(),
            'definition' => $definitions[$i],
            'mota' => $motas[$i],
            'image' => $imagePath, // Đường dẫn của hình ảnh lưu trữ
            // Các trường khác nếu có
        );

        $quiz = new Quiz($quizData);
        $quiz->save();
        
    }
    return redirect()->route('quizz.index')->with('success', 'Thêm sản phẩm thành công!');
}
    

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quizzes = DB::table('quizzes')->where('quizzes_id', $id)->first();
        return view('card.index',  ['quizz'=>$quizzes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the quiz by ID
        $quizzes = DB::table('quizzes')->where('user_id', auth()->id())->paginate();
        return view('card.edit', compact('quizzes'));
    }
    
    
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
        $quizData = array(
            'title' => $request->title,
            'description' => $request->description,
            'nameschool' => $request->nameschool,
            'namecourse' => $request->namecourse,
       
        );
          
   
      
        DB::table('quizzes')->where('id',$id)->update($quizData);
    
        return redirect()->route('quizz.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $quizzes = DB::table('quizzes')->where('quizzes_id', $id)->first();
        return view('course.delete',  ['quizz'=>$quizzes]);
    }
    public function destroy(string $id)
    {
        // Lấy thông tin câu hỏi trước khi xóa
        $quizz = Quiz::where('quizzes_id', $id)->first();
    
        if (!$quizz) {
            abort(404); // Câu hỏi không tồn tại
        }
    
        // Lấy thông tin về khóa học mà câu hỏi thuộc về
        $courseId = $quizz->course_id;
    
        // Xóa câu hỏi từ bảng 'quizzes'
        DB::table('quizzes')->where('quizzes_id', $id)->delete();
    
        // Cập nhật 'quizzes_id' trong bảng 'quizzes' theo thứ tự tăng dần
        DB::statement("SET @new_id = 0;");
        DB::statement("UPDATE quizzes SET quizzes_id = (@new_id := @new_id + 1)");
    
        // Kiểm tra xem khóa học có còn câu hỏi nào không
        $quizzesCount = Quiz::where('course_id', $courseId)->count();
    
        // Nếu không còn câu hỏi thuộc về khóa học, thì xóa khóa học
        if ($quizzesCount === 0) {
            DB::table('courses')->where('course_id', $courseId)->delete();
            

    
            // Chuyển hướng về trang danh sách khóa học
            return redirect()->route('course.index');
        }
    
        // Chuyển hướng về trang chỉnh sửa khóa học
        return redirect()->route('course.edit', ['course' => $courseId]);
    }
    
    
}
