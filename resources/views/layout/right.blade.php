<style>
  /* Thêm padding và border-radius cho card */
.card {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Thiết lập màu sắc và border cho link trong card */
.card a {
    text-decoration: none;
}

.card a:hover {
    color: #0d47a1;
 
}

/* Thiết lập border cho table */
.table {
    border: 1px solid #ddd;
    border-collapse: collapse;
    width: 100%;
}

/* Thiết lập màu sắc và border cho th và td trong table */
.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

/* Thiết lập màu sắc cho background của th và td trong table */
.table th {
    background-color: #f2f2f2;
}

/* Thêm padding và margin cho news-list */
.news-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

/* Thiết lập màu sắc và icon cho news-icon */
.news-icon {
    margin-right: 5px;
    color: #ffab40; /* Màu cam */
}

/* Thêm padding và margin cho rank-icon và user-icon */
.rank-icon, .user-icon {
    margin-right: 5px;
}

/* Thiết lập màu sắc cho rank-icon */
.rank-icon i {
    color: #ffeb3b; /* Màu vàng */
}

/* Thiết lập màu sắc cho user-icon */
.user-icon i {
    color: #4caf50; /* Màu xanh lá cây */
}

  </style>
<div class="row row-cols-1 row-cols-md-1 g-4"> 
    <div class="col-md-11">
      <!-- Nội dung của cột -->
      <div class="card">
        <h2>Streaks</h2>
        
        <center class="AchievementsImageContainer AchievementsImageContainer--medium AchievementsImageContainer--goalTextAlignment-bottom akxyc9n" data-testid="achievements-image-container"><img alt="Chuỗi 1 tuần" src="https://quizlet.com/static/achievements/streak-Week.svg" class="i11kdv2c"><span data-testid="goal-number" class="aup4qff">1</span></center>
  
      </div>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-1 g-4"> 
    <div class="col-md-11">
      <!-- Nội dung của cột -->
      <div class="card">
        <ul class="news-list">
          <li>
            <span class="news-icon"><i class="fas fa-bell"></i></span>
            <span class="news-content">Tin tức 1</span>
          </li>
          <li>
            <span class="news-icon"><i class="fas fa-bell"></i></span>
            <span class="news-content">Tin tức 2</span>
          </li>
          <li>
            <span class="news-icon"><i class="fas fa-bell"></i></span>
            <span class="news-content">Tin tức 3</span>
          </li>
          <li>
            <span class="news-icon"><i class="fas fa-bell"></i></span>
            <span class="news-content">Tin tức 4</span>
          </li>
         
        </ul>
  
      </div>
    </div>
  </div>
 
  <div class="row row-cols-1 row-cols-md-1 g-4"> 
    <div class="col-md-11">
      <!-- Nội dung của cột -->
      <div class="card">
        <table class="table">
          <thead>
            <tr>
              <th>STT</th>
              <th>User</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Người dùng A</td>
              <td><i class="bi bi-icons bi-check-circle text-success"></i> <i class="fa-regular fa-comment"></i></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Người dùng B</td>
              <td><i class="bi bi-icons bi-check-circle text-success"></i> <i class="fa-regular fa-comment"></i></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Người dùng C</td>
              <td><i class="fa-regular fa-comment"></i></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Người dùng D</td>
              <td><i class="fa-regular fa-comment"></i></td>
            </tr>
            <tr>
              <td>5</td>
              <td>Người dùng E</td>
              <td><i class="fa-regular fa-comment"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
