<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;
use App\Models\BannedAccount;

class AdminController extends Controller
{
public function __construct(){
    $this->middleware('auth');
}
     public function index()
    {
        $courses = Course::all(); // Fetch courses from your database
        return view('layout.main');
    }


    /**
     * Show the form for creating a new resource.
     */
public function create(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'role' => 'required|string',
        ]);

        // Create new user
        $user = User::create([
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'password' => bcrypt('12345678'), // Set default password
        ]);

        return response()->json(['message' => 'User created successfully']);
    }
    public function main()
    {
        $user = user::all(); // Fetch courses from your database
        return view('admin.index', ['user' => $user]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function delete(string $id)
    {
        $accounts = DB::table('users')->where('id', $id)->first();
        return view('admin.destroy',  ['account'=>$accounts]);
    }
    public function destroy(Request $request, string $id)
    {
        $reason = $request->input('reason');
        $accounts = DB::table('users')->where('id', $id)->first();
    
        if (!$accounts) {
            abort(404); // Tài khoản không tồn tại
        }
    
        // Lấy thông tin về user mà bạn đang xử lý
        $accountId = $accounts->id;
        $status = $accounts->Status;
    
        // Cập nhật trạng thái của tài khoản
        $newStatus = ($status == 'Banned') ? 'Active' : 'Banned';
        DB::table('users')->where('id', $id)->update(['status' => $newStatus]);
    
        // Nếu trạng thái là Banned, xóa dữ liệu trong bảng 'banned_accounts'
        if ($status == 'Banned') {
            BannedAccount::where('user_id', $accountId)->delete();
        } else {
            // Nếu trạng thái không phải Banned, thêm hoặc cập nhật bản ghi trong bảng 'banned_accounts'
            BannedAccount::updateOrCreate(
                ['user_id' => $accountId],
                ['reason' => $reason, 'release_date' => now()->addMonth()]
            );
        }
    
        // Cập nhật 'quizzes_id' trong bảng 'quizzes' theo thứ tự tăng dần
        DB::statement("SET @new_id = 0;");
        DB::statement("UPDATE users SET id = (@new_id := @new_id + 1)");
        $userall = User::all(); // Fetch users from your database
    
        // Chuyển hướng về trang quản lý người dùng
        return view('admin.index', ['user' => $userall]);
    }
    

    
}
