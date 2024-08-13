
@extends('layout.random')
@section('random')
    <div class="container2">
        <h2 class="quiz_text">Question Text</h2>
        <ul>
          <li>
            <input type="radio" id="a_1" name="selection">
            <label for="a_1" class="a_text">Langyxiuan</label>
            <svg width="20" height="20">
              <polyline class="tick" points="4,9 8,13 14,5" />
            </svg>
          </li>
          <li>
            <input type="radio" id="a_2" name="selection">
            <label for="a_2" class="b_text">Xiongshunrui</label>
            <svg width="20" height="20">
              <polyline class="tick" points="4,9 8,13 14,5" />
            </svg>
          </li>
          <li>
            <input type="radio" id="a_3" name="selection">
            <label for="a_3" class="c_text">Lizhihong</label>
            <svg width="20" height="20">
              <polyline class="tick" points="4,9 8,13 14,5" />
            </svg>
          </li>
          <li>
            <input type="radio" id="a_4" name="selection">
            <label for="a_4" class="d_text">Wangyifan</label>
            <svg width="20" height="20">
              <polyline class="tick" points="4,9 8,13 14,5" />
            </svg>
          </li>
        </ul>
        <div class="next">
          <svg color="black" width="80" height="48">
            <polyline class="nextline" points="21,27 57,27 47,17 57,27 47,37" />
          </svg>
        </div>
        <div class="prev">
          <svg color="black" width="80" height="48">
            <polyline class="prevline" points="57,27 21,27 31,18 21,27 31,38" />
          </svg>
        </div>
        <span class="correct_answer">
          Check Answer
        </span>
      </div>
      <form action="{{ route('course.index') }}" method="get" enctype="multipart/form-data"  id="scoreForm" style="display: none;">
        <h2>Your Score</h2>
        <p id="scoreResult"></p>
        <input type="submit" style="background-color: #3498db; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
      </form>
  
      <script>
        const questions = [
            @foreach ($quizSets as $set)
            {
                name: "{{ $set['question'] }}",
                a_1: "{{ $set['correctQuizId'] }}",
                a_2: "{{ $set['incorrectQuizIds'][0] }}",
                a_3: "{{ $set['incorrectQuizIds'][1] }}",
                a_4: "{{ $set['incorrectQuizIds'][2] }}",
                correct: "{{ $set['correctQuizId'] }}"
            },
        @endforeach
]

const quizText = document.querySelector('.quiz_text');

const a_text = document.querySelector('.a_text');
const b_text = document.querySelector('.b_text');
const c_text = document.querySelector('.c_text');
const d_text = document.querySelector('.d_text');

const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');
const radioEls = document.querySelectorAll(`input[type="radio"]`);
const correctAnswer = document.querySelector('.correct_answer');
const labelEls = document.querySelectorAll('label');
let diem = 0;
let currentQuiz = 0;
const totalquiz = questions.length;
loadQuiz();

function loadQuiz() {
    const currentQuizData = questions[currentQuiz];

    // Create an array with all options
    const options = [
        { key: "a_1", value: currentQuizData["a_1"] },
        { key: "a_2", value: currentQuizData["a_2"] },
        { key: "a_3", value: currentQuizData["a_3"] },
        { key: "a_4", value: currentQuizData["a_4"] },
    ];

    // Shuffle the options array
    for (let i = options.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [options[i], options[j]] = [options[j], options[i]];
    }

    // Assign shuffled options to HTML elements
    quizText.innerHTML = currentQuizData["name"];
    a_text.innerHTML = options[0].value;
    b_text.innerHTML = options[1].value;
    c_text.innerHTML = options[2].value;
    d_text.innerHTML = options[3].value;
}




nextBtn.addEventListener('click', () => {
    const userAnswer = document.querySelector('input[type="radio"]:checked');
    if (userAnswer) {
        if (document.querySelector(`label[for="${userAnswer.id}"]`).textContent === questions[currentQuiz]['correct']) {
            diem++;
        }
    }
    
    // Clear the selection for the next question
    radioEls.forEach((radioEl) => {
        radioEl.checked = false;
    });

    // Load the next quiz
    currentQuiz++;
    if (currentQuiz < questions.length) {
        loadQuiz();
    } else {
      document.getElementById('scoreResult').textContent = `Your Score: ${diem}/${totalquiz}`;
        document.getElementById('scoreForm').style.display = 'flex';
        document.getElementById('scoreForm').style.flexDirection = 'column';
        document.getElementById('scoreForm').style.justifyContent = 'center';
        document.getElementById('scoreForm').style.alignItems = 'center';
    }
});

prevBtn.addEventListener('click', () => {
  correctAnswer.innerHTML = "Check Answer";
  correctAnswer.style.backgroundColor = "#000";

  currentQuiz--;
  if (currentQuiz >= 0) {
    loadQuiz();
  } else {
    currentQuiz++;
    alert("This is the first quiz");
  }
})

correctAnswer.addEventListener('click', (e) => {
  e.target.innerHTML = `Correct Answer: ${questions[currentQuiz].correct}`;
  e.target.style.backgroundColor = " rgb(57, 219, 65)";
})
      </script>

{{-- @if(count($quizSets) > 0)
    <h2>Quiz Sets:</h2>
    @foreach ($quizSets as $set)
        <p>Correct Quiz ID: {{ $set['correctQuizId'] }}</p>
        <p>Incorrect Quiz IDs:</p>
        @foreach ($set['incorrectQuizIds'] as $incorrectQuizId)
            <p>{{ $incorrectQuizId }}</p>
        @endforeach
    @endforeach
@endif --}}
@endsection