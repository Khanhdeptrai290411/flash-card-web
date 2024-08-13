

<form action="{{ route('admin.destroy',  $account->id) }}" method="post" style="display:none;">
    @csrf
    @method('DELETE')

    <!-- Hiển thị thông tin của câu hỏi tại đây -->

    <button type="submit" id="deleteButton" class="btn btn-sm btn-remove-tag d-flex justify-content-center" title="Xóa thẻ" >
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
<script>
    // Đợi cho trang hoàn tất load
    document.addEventListener('DOMContentLoaded', function () {
        // Auto click vào button khi trang đã được load
        document.getElementById('deleteButton').click();
    });
</script>
