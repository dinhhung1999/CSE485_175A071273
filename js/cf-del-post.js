function confirmDelete() {

    if (!confirm("Bạn có chắc chắc muốn xóa không ?")) {
        $('a').attr("href", "posts.php")
    }
  }