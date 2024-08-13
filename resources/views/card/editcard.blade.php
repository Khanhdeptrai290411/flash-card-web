<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('styleCreate.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Thêm tệp CSS của Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body>

<x-app-layout>
    <div class="create">
        <h5><a href="javascript:history.back()">Back</a></h5>
        <div class="created sticky ">
            <h2>Tạo học phần mới</h2>
            <center><button type="submit" class="btn btn-outline-blue btn-md btn-created bg-primary">Hoàn Tất</button>
            </center>
        </div>
        <div class="container">
            <div class="row">

                <div class="form-container">

                    @yield('course')
              

                </div>

            </div>


            <div class="row">
                <div class="col-md-6 offset-md-3 text-center"> <!-- Căn giữa theo chiều ngang -->
                    <button aria-label="+ Thêm thẻ" class=" btn-add-tag UILinkButton" type="button"><span>+ Thêm
                            thẻ</span></button>
                </div>
            </div>

        </div>
        <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Categories</h6>
        <ul class="footer-links">
          <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
          <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
          <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
          <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
          <li><a href="http://scanfcode.com/category/android/">Android</a></li>
          <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li><a href="http://scanfcode.com/about/">About Us</a></li>
          <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
          <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
          <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
          <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
     <a href="#">Scanfcode</a>.
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <!-- <ul class="social-icons">
          <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a class="dribbble" href="#"><i class="fa-solid fa-basketball"></i></a></li>
          <li><a class="linkedin" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>   
        </ul> -->
      </div>
    </div>
  </div>



    </div>
</x-app-layout>
</body>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        var submitButton = document.querySelector('.btn-created');

        submitButton.addEventListener('click', function () {
            // Gửi form khi nút được nhấn
            document.getElementById('quizzForm').submit();
        });
    }); 


    function test() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
        var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
        var itemPosNewAnimTop = activeItemNewAnim.position();
        var itemPosNewAnimLeft = activeItemNewAnim.position();
        $(".hori-selector").css({
            "top": itemPosNewAnimTop.top + "px",
            "left": itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
        $("#navbarSupportedContent").on("click", "li", function(e) {
            $('#navbarSupportedContent ul li').removeClass("active");
            $(this).addClass('active');
            var activeWidthNewAnimHeight = $(this).innerHeight();
            var activeWidthNewAnimWidth = $(this).innerWidth();
            var itemPosNewAnimTop = $(this).position();
            var itemPosNewAnimLeft = $(this).position();
            $(".hori-selector").css({
                "top": itemPosNewAnimTop.top + "px",
                "left": itemPosNewAnimLeft.left + "px",
                "height": activeWidthNewAnimHeight + "px",
                "width": activeWidthNewAnimWidth + "px"
            });
        });
    }
    $(document).ready(function() {
        setTimeout(function() {
            test();
        });
    });
    $(window).on('resize', function() {
        setTimeout(function() {
            test();
        }, 500);
    });
    $(".navbar-toggler").click(function() {
        $(".navbar-collapse").slideToggle(300);
        setTimeout(function() {
            test();
        });
    });



    // --------------add active class-on another-page move----------
    jQuery(document).ready(function($) {
        // Get current path and find target link
        var path = window.location.pathname.split("/").pop();

        // Account for home page with empty path
        if (path == '') {
            path = 'index.html';
        }

        var target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
        // Add active class to target link
        target.parent().addClass('active');
    });





    var tagCounter ={{ $quizz->quizzes_id }};

    document.addEventListener("DOMContentLoaded", function() {
        const tagsContainer = document.getElementById("tags-container");
        const addTagButton = document.querySelector(".btn-add-tag");


        addTagButton.addEventListener("click", function() {
            tagCounter++;

            const tagContainer = document.createElement("div");
            tagContainer.classList.add("tag-container");

            const spanAndButtonContainer = document.createElement("div");
            spanAndButtonContainer.classList.add("head_toolbar");

            const tagNumber = document.createElement("span");
            tagNumber.textContent = tagCounter + ". ";

            const removeTagButton = document.createElement("button");
            removeTagButton.classList.add("btn", "btn-sm", "btn-remove-tag", "d-flex",
                "justify-content-center");
            removeTagButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
            removeTagButton.title = "Xóa thẻ"; // Chú thích hiển thị khi di chuột vào nút xóa

            spanAndButtonContainer.appendChild(tagNumber);
            spanAndButtonContainer.appendChild(removeTagButton);

            const inputContainer = document.createElement("div");
            inputContainer.classList.add("inputContainer");

            const definitionInput = document.createElement("input");
            definitionInput.type = "text";
            definitionInput.placeholder = "Nhập định nghĩa";
            //   definitionInput.classList.add("form-control", "question");
            definitionInput.name = `definition[]`;

            definitionInput.classList.add("form-control", "question", "no-box-shadow");

            // Append the element to the document or a parent element
            document.body.appendChild(definitionInput);

            const descriptionInput = document.createElement("textarea");
            descriptionInput.placeholder = "Nhập mô tả";
            descriptionInput.name = `mota[]`;
            
            descriptionInput.classList.add("form-control", "thongtin", "no-box-shadow");
            document.body.appendChild(descriptionInput);

            const imageInputContainer = document.createElement("label");
            imageInputContainer.classList.add("album-label");
            imageInputContainer.setAttribute("for", `imageInput${tagCounter}`);

            const imageInput = document.createElement("input");
            imageInput.type = "file";
            imageInput.name= `imageInput[]`;
            imageInput.id = `imageInput${tagCounter}`;
            imageInput.style.display = "none";
            imageInput.classList.add("form-control", "anh");

            const albumImage = document.createElement("img");
            albumImage.classList.add("album-image");

            const cameraIcon = document.createElement("i");
            cameraIcon.classList.add("far", "fa-image");

            // Xử lý sự kiện change khi người dùng chọn một tệp hình ảnh
            imageInput.addEventListener("change", function() {
                const selectedImage = imageInput.files[0];
                if (selectedImage) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        albumImage.src = e.target.result;
                    };
                    reader.readAsDataURL(selectedImage);
                }
            });
            // Sự kiện khi hình ảnh tải lên thành công
            albumImage.onload = function() {
                cameraIcon.style.display = "none"; // Ẩn icon camera khi hình ảnh đã tải lên
            };
            imageInputContainer.appendChild(albumImage);
            imageInputContainer.appendChild(cameraIcon);

            imageInputContainer.appendChild(imageInput);

            removeTagButton.addEventListener("click", function() {
                tagContainer.remove();
            });

            inputContainer.appendChild(definitionInput);
            inputContainer.appendChild(descriptionInput);
            inputContainer.appendChild(imageInputContainer);

            tagContainer.appendChild(spanAndButtonContainer);
            tagContainer.appendChild(inputContainer);

            tagsContainer.appendChild(tagContainer);
        });
    });




    $(document).ready(function() {
        $(window).scroll(function() {
            // sticky navbar on scroll script
            if (this.scrollY > 20) {
                $('.created').addClass("sticky-top");

            } else {
                $('.created').removeClass("sticky-top");
            }
            if (this.scrollY > 20) {
                $('.navbar').removeClass("sticky-top");

            } else {
                $('.navbar').addClass("sticky-top");
            }

            // scroll-up button show/hide script


        });
    });
    
</script>

</html>
