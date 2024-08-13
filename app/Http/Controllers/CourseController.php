<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $courses= DB::table('courses')->where('user_id', auth()->id())->paginate();
        return view('course.index', compact('courses'));
    }
    public function page3()
    {

        return view('layout.page3');
    }
    public function page4()
    {

        return view('layout.page4');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'nameschool' => 'required',
            'namecourse' => 'required',
            'definition' =>'required',
            'mota' => 'required',
        ]);
  

        // Tạo mới một Course và lấy id của nó
        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'nameschool' => $request->nameschool,
            'namecourse' => $request->namecourse,
            'user_id' => auth()->id(),
        ]);
        // Kiểm tra xem bản ghi Course có tồn tại và có id không

            $definitions = $request->input('definition');
            $motas = $request->input('mota');
    
            for ($i = 0; $i < count($definitions); $i++) {
                // Lưu trữ hình ảnh vào public/uploads
                $imagePath = null;
                if ($request->hasFile('imageInput') && $request->file('imageInput')[$i]->isValid()) {
                    // Lưu ảnh vào thư mục 'public/uploads'
                    $imagePath = $request->file('imageInput')[$i]->store('uploads', 'public');
                }
    
                $quizData = [
                    'course_id' => $course->course_id,
                    'user_id' => auth()->id(),
                    'definition' => $definitions[$i],
                    'mota' => $motas[$i],
                    'image' => $imagePath,
                    // Các trường khác nếu có
                ];
    
                $quiz = new Quiz($quizData);
                $quiz->save();
            }
    
            return redirect()->route('course.index')->with('success', 'Thêm sản phẩm thành công!');
    
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with('quizzes')->find($id);
        $quizzes = Quiz::first(); // Assuming you want the first quiz, you may need to adjust this logic based on your requirements
    
        if (!$course) {
            abort(404); // Course not found
        }
    
        return view('card.index', compact('course', 'quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with('quizzes')->find($id);
        $quizzes = Quiz::first(); // Assuming you want the first quiz, you may need to adjust this logic based on your requirements
    
        if (!$course) {
            abort(404); // Course not found
        }
    
        return view('course.edit', compact('course', 'quizzes'));
    }
    
    
    
    

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $courseId)
    {
        // Update course data
        $courseData = [
            'title' => $request->title,
            'description' => $request->description,
            'nameschool' => $request->nameschool,
            'namecourse' => $request->namecourse,
            'updated_at' => now(),
        ];
    
        DB::table('courses')->where('course_id', $courseId)->update($courseData);
    
        // Check if quizzes data is present in the request
        if ($request->has('quizzes')) {
            foreach ($request->quizzes as $quizId => $quizData) {
                // Process each quiz
        
                $quizUpdateData = [
                    'definition' => $quizData['definition'],
                    'mota' => $quizData['mota'],
                    'updated_at' => now(),
                ];
        
                // Check if the 'imageInput' key exists in the $quizData array
                if (isset($quizData['imageInput'])) {
                    $temporaryPath = $quizData['imageInput'];
                    // Tạo đường dẫn mới và di chuyển hình ảnh đến đó trong public/uploads
                    $newPath = $this->uploadImage($temporaryPath);
                    // Thêm đường dẫn mới vào mảng $quizUpdateData
                    $quizUpdateData['image'] = $newPath;
                }
        
                // Cập nhật dữ liệu trong cơ sở dữ liệu
                DB::table('quizzes')->where('quizzes_id', $quizId)->update($quizUpdateData);
            }
        }
    
        // Process and store new quizzes
        $definitions = $request->input('definition');
        $motas = $request->input('mota');
    
        if ($definitions) {
            for ($i = 0; $i < count($definitions); $i++) {
                $imagePath = null;
    
                if ($request->hasFile('imageInput') && $request->file('imageInput')[$i]->isValid()) {
                    $imagePath = $request->file('imageInput')[$i]->store('uploads', 'public');
                }
    
                $quizData = [
                    'course_id' => $courseId,
                    'user_id' => auth()->id(),
                    'definition' => $definitions[$i],
                    'mota' => $motas[$i],
                    'image' => $imagePath,
                ];
    
                $quiz = new Quiz($quizData);
                $quiz->save();
            }
        }
    
        return redirect()->route('course.index');
    }
    
    
    protected function deleteOldImage($imagePath)
    {
        // Xóa ảnh cũ từ thư mục lưu trữ
        if ($imagePath) {
            Storage::delete('public/' . $imagePath);
        }
    }
    
   // Helper function to upload image
protected function uploadImage($file)
{
    // Tạo tên tệp tin mới
    $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();

    // Lưu ảnh mới và trả về đường dẫn
    return $file->storeAs('uploads', $newFileName, 'public');
}



    
    

    
    
    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy(string $course_id)
     {
      
     }
     public function search(Request $request)
{
    $query = $request->input('query');

    $courses = Course::where('title', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%')
                     ->get();

    return view('course.index', ['courses' => $courses]);
}
public function random(string $courseId)
{
    $course = Course::with('quizzes')->find($courseId);

    if (!$course) {
        abort(404); // Course not found
    }

    // Fetch all quizzes for the course
    $allQuizzes = Quiz::where('course_id', $courseId)->get();

    // Check if there are enough quizzes
    if (count($allQuizzes) < 4) {
        // Display alert if not enough quizzes
        return view('card.not-enough-quizzes');
    }

    $quizSets = [];

    // Iterate through each quiz to create sets
    foreach ($allQuizzes as $correctQuiz) {
        // Fetch three incorrect quizzes (excluding the correct one)
        $incorrectQuizzes = Quiz::where('course_id', $courseId)
            ->where('quizzes_id', '!=', $correctQuiz->definition)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('definition')
            ->toArray();

        // Create an array for the set
        $quizSet = [
            'question' => $correctQuiz->mota,
            'correctQuizId' => $correctQuiz->definition,
            'incorrectQuizIds' => $incorrectQuizzes,
        ];

        // Add the set to the array
        $quizSets[] = $quizSet;
    }

    return view('card.random', compact('quizSets'));
}

public function result(string $courseId){


}
     
}
