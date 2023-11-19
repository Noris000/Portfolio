<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="icon" href="/image/logo.png" type="image/png">
    <link rel="stylesheet" href="portfolio.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-............" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <h1>Normunds Lazdiņš</h1>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="about">
        <h2>About Me</h2>
        <p>🚀 Hey there! I'm Normunds, a web programmer in my final year at VTDT.💬 </P>
        <p>💡 I use HTML, CSS, PHP, and JavaScript, love turning ideas into interactive web realities. From dynamic designs with Bootstrap and adding the extra charm of Font Awesome, to sleek functionality with jQuery.</p>
        <p> Currently have started immersing myself in the mysteries of React, and I'm on a quest to level up my skills. As I approach the finish line of my programming journey. 🌐✨.</p>
        <p>I'm constantly tuned into the world of music, discovering new artists and genres. 🚴‍♂️ Cycling is my way of navigating the offline world, and I find the perfect balance between strategy and leisure in the realm of video games.</p>
    </section>

    <section id="portfolio">
        <h2>Portfolio</h2>
        <div class="slider-wrapper">
          <button id="prevBtn">&lt;</button>
        <div id="slider-container">
  <div id="slider-projects">
    <div class="slider-project">
      <div class="portfolio-item">
        <a href="http://minesweeper.lazdins.id.lv/"><h3>Minesweeper</h3></a>
        <p>This is a project that I made for nostalgic reasons and reflects my love for classic games.</p>
      </div>
    </div>
    <div class="slider-project">
      <div class="portfolio-item">
        <a href="http://library.lazdins.id.lv/index.php"><h3>Library</h3></a>
        <p>Small online library project/work with a sorting system. - Might make it better.</p>
      </div>
    </div>
    <div class="slider-project">
      <div class="portfolio-item">
        <a href="http://weather.lazdins.id.lv"><h3>Weather</h3></a>
        <p>Small weather project with an API which has information about today and the next 3 days.</p>
      </div>
    </div>
    <div class="slider-project">
      <div class="portfolio-item">
        <a href="https://normunds.lazdins.id.lv/bruh/?page=welcome"><h3>Random small old works</h3></a>
        <p>A few small old works some might not work either because of API or some code problems</p>
      </div>
    </div>
    <!-- Add more projects as needed -->
  </div>
</div>

<button id="nextBtn">&gt;</button>
</div>
<script>
  const sliderProjects = document.getElementById('slider-projects');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  let currentIndex = 0;

  nextBtn.addEventListener('click', () => {
    if (currentIndex < sliderProjects.children.length - 1) {
      currentIndex++;
    } else {
      currentIndex = 0;
    }
    updateSlider();
  });

  prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = sliderProjects.children.length - 1;
    }
    updateSlider();
  });

  function updateSlider() {
    const translateValue = -currentIndex * 100 + '%';
    sliderProjects.style.transform = 'translateX(' + translateValue + ')';
  }
</script>
    </section>

    <section class="quote">
    <div class="container-quote">
        <h1>Random Quote Generator</h1>
        <div id="quote-container">
            <?php
            $quotes = array(
                "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt",
                "Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
                "The only way to do great work is to love what you do. - Steve Jobs",
                "Believe you can and you're halfway there. -Theodore Roosevelt",
                "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt"
            );

            $randomQuote = $quotes[array_rand($quotes)];
            echo "<p>{$randomQuote}</p>";
            ?>
        </div>
        <button class="generate-quote" id="generate-btn">Generate Quote</button>
    </div>
    <script>
        $(document).ready(function () {
            // PHP array to JavaScript array
            var quotesArray = <?php echo json_encode($quotes); ?>;

            $('#generate-btn').on('click', function () {
                // Get a random quote from the JavaScript array
                var newRandomQuote = quotesArray[Math.floor(Math.random() * quotesArray.length)];
                
                // Update the quote container with the new quote
                $('#quote-container').html("<p>" + newRandomQuote + "</p>");
            });
        });
    </script>
</section>

    <section id="random-number-generator" class="random-number-generator">
        <h2>Random Number Generator</h2>
        <form action="" method="post">
            <label for="min">Minimum Number:</label>
            <input type="number" id="min" name="min" required>

            <label for="max">Maximum Number:</label>
            <input type="number" id="max" name="max" required>

            <button class="generate" type="submit">Generate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $min = $_POST["min"];
            $max = $_POST["max"];

            if ($min <= $max) {
                $randomNumber = rand($min, $max);
                echo "<p>Your random number is: $randomNumber</p>";
            } else {
                echo "<p>Error: Minimum number must be less than or equal to the maximum number.</p>";
            }
        }
        ?>
    </section>

<section class="coin-section">
<div id="coin">
  <div class="side-a"></div>
  <div class="side-b"></div>
</div>
<h1>Click on coin to flip</h1>

<script>
jQuery(document).ready(function($){

$('#coin').on('click', function(){
  var flipResult = Math.random();
  $('#coin').removeClass('heads tails'); // Remove both 'heads' and 'tails' classes
  setTimeout(function(){
    if(flipResult < 0.5){ // Adjusted the condition
      $('#coin').addClass('heads');
      console.log('it is head');
    }
    else{
      $('#coin').addClass('tails');
      console.log('it is tails');
    }
  }, 100);
});
});

</script>

</section>

<section class="todo">

<div class="todo-app">
      <form class="input-section">
      <input type="text" id="search-input" placeholder="Search" />
        <button type="button" id="search-button">Search</button>
        <button
          type="button"
          class="add"
          id="update-button"
          style="display: none"
        >
          Update
        </button>
        <input id="todoInput" type="text" placeholder="Add item..." />
        <button id="addBtn" type="submit" class="add">Add</button>
      </form>
      <div class="todos">
        <ul class="todo-list">
          <!-- <li class="li">
          <input class="form-check-input" type="checkbox" value="option1">
          <label class="form-check-label" for="inlineCheckbox1"></label>
          <span class="todo-text">text</span>
          <span class="todo-text">date</span>
          <span class="span-button"><i class="fa-solid fa-trash"></i></span>
          <span class="span-button"><i class="fa-solid fa-pen"></i></span>
        </li> -->
        </ul>
        <!--       
        <img class="face" src="asetes/thinking.png" alt="">
        <h1 class="not-found"> NOT FOUND</h1> -->
      </div>
    </div>

    <script>
    let todos = JSON.parse(localStorage.getItem("todos")) || [];
let editIndex = -1;
const todoForm = document.querySelector(".input-section");
const todoInput = document.querySelector("#todoInput");
const todoList = document.querySelector(".todo-list");
const addButton = document.querySelector("#addBtn");
const updateButton = document.getElementById("update-button");
const searchInput = document.getElementById("search-input");
const searchButton = document.getElementById("search-button");
const todo_main = document.querySelector(".todos");

function saveTodos() {
  localStorage.setItem("todos", JSON.stringify(todos));
}

function renderTodos() {
  todoList.innerHTML = "";

  todos.forEach((todo, index) => {
    const li = document.createElement("li");
    li.className = "li";

    const checkbox = document.createElement("input");
    checkbox.className = "form-check-input";
    checkbox.type = "checkbox";
    checkbox.value = "option1";
    checkbox.checked = todo.completed;
    checkbox.addEventListener("change", () => toggleTodoCompleted(index));

    const label = document.createElement("label");
    label.className = "form-check-label";

    const spanText = document.createElement("span");
    spanText.className = `todo-text ${todo.completed ? 'completed' : ''}`;
    spanText.textContent = `${todo.text} (${todo.date})`;

    const deleteButton = document.createElement("span");
    deleteButton.className = "span-button";
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    deleteButton.addEventListener("click", () => deleteTodo(index));

    const editButton = document.createElement("span");
    editButton.className = "span-button";
    editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';
    editButton.addEventListener("click", () => editTodo(index));

    li.appendChild(checkbox);
    li.appendChild(label);
    li.appendChild(spanText);
    li.appendChild(deleteButton);
    li.appendChild(editButton);

    todoList.appendChild(li);
  });
}

function deleteTodo(index) {
  todos.splice(index, 1);
  saveTodos();
  renderTodos();
}

function addTodo() {
  const todoText = todoInput.value.trim();

  if (todoText !== "") {
    const currentDate = new Date();

    if (editIndex === -1) {
      todos.push({
        text: todoText,
        completed: false,
        date: currentDate.toLocaleString(),
      });
    } else {
      todos[editIndex].text = todoText;
      todos[editIndex].date = currentDate.toLocaleString();
      editIndex = -1;
      addButton.style.display = "inline";
      updateButton.style.display = "none";
    }

    saveTodos();
    renderTodos();
    todoInput.value = "";
  }

  return false;
}

function toggleTodoCompleted(index) {
  todos[index].completed = !todos[index].completed;
  saveTodos();
  renderTodos();
}

function editTodo(index) {
  const todoText = todos[index].text;
  todoInput.value = todoText;
  editIndex = index;
  addButton.style.display = "none";
  updateButton.style.display = "inline";
}

function searchTodo() {
  const searchQuery = searchInput.value.trim();
  if (searchQuery !== "") {
    const searchResults = todos.filter((todo) =>
      todo.text.toLowerCase().includes(searchQuery.toLowerCase())
    );
    renderSearchResults(searchResults);
  } else {
    renderTodos();
  }
}

function renderSearchResults(results) {
  todoList.innerHTML = "";

  if (results.length > 0) {
    results.forEach((todo, index) => {
      const li = document.createElement("li");
      li.className = "li";

      const checkbox = document.createElement("input");
      checkbox.className = "form-check-input";
      checkbox.type = "checkbox";
      checkbox.value = "option1";
      checkbox.checked = todo.completed;
      checkbox.addEventListener("change", () => toggleTodoCompleted(index));

      const label = document.createElement("label");
      label.className = "form-check-label";

      const spanText = document.createElement("span");
      spanText.className = "todo-text";
      spanText.textContent = `${todo.text} (${todo.date})`;

      const deleteButton = document.createElement("span");
      deleteButton.className = "span-button";
      deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
      deleteButton.addEventListener("click", () => deleteTodo(index));

      const editButton = document.createElement("span");
      editButton.className = "span-button";
      editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';
      editButton.addEventListener("click", () => editTodo(index));

      li.appendChild(checkbox);
      li.appendChild(label);
      li.appendChild(spanText);
      li.appendChild(deleteButton);
      li.appendChild(editButton);

      todoList.appendChild(li);
    });
  } else {
    todo_main.innerHTML = `<img class="face" src="asetes/thinking.png" alt="">
                            <h1 class="not-found"> NOT FOUND</h1>`;
  }
}

todoForm.addEventListener("submit", addTodo);
updateButton.addEventListener("click", addTodo);
searchButton.addEventListener("click", searchTodo);
renderTodos();
</script>

</section>

<section class="info-wrapper">
<input type="radio" name="switch" id="i_1" checked>
<input type="radio" name="switch" id="i_2">
<input type="radio" name="switch" id="i_3">
<input type="radio" name="switch" id="i_4">
<input type="radio" name="switch" id="i_5">
<div class="wrapper">
  <div class="slide">
    <div class="content content1">
      <h2>Fundamentals:</h2>
      <p><a href="https://developer.mozilla.org/en-US/docs/Learn/Getting_started_with_the_web/HTML_basics">HTML,</a><a href="https://developer.mozilla.org/en-US/docs/Web/CSS"> CSS</a></p>
    </div>   
  </div>
  <div class="slide">
    <div class="content content2">
    <h2>Languages:</h2>
    <p><a href="https://www.php.net/">PHP,</a><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript"> JavaScript</a></p>
    </div>    
  </div>
  <div class="slide">
    <div class="content content3">
    <h2>Libraries:</h2>
    <p><a href="https://getbootstrap.com/">Bootstrap,</a><a href="https://fontawesome.com/"> Font Awesome,</a><a href="https://api.jquery.com/"> jQuery</a></p>
    </div>
  </div>
  <div class="slide">
    <div class="content content4">
    <h2>Frameworks:</h2>
    <p><a href="https://react.dev/">React</a></p>
    </div>    
  </div>
  <div class="slide">
    <div class="content content5">
    <h2>Database:</h2>
    <p><a href="https://www.mysql.com/">MySQL,</a><a href="https://www.phpmyadmin.net/"> phpMyAdmin</a></p>
    </div>    
  </div>
</div>
<div class="controls">
  <label for="i_1">⬤</label>
  <label for="i_2">⬤</label>
  <label for="i_3">⬤</label>
  <label for="i_4">⬤</label>
  <label for="i_5">⬤</label>
</div>
</section>

<section id="contact" class="contact">
    <h2>📧 Contact me at:</h2>
    <p><i class="fas fa-envelope"></i> <a href="mailto:ip20.n.lazdins@vtdt.edu.lv">ip20.n.lazdins@vtdt.edu.lv</a></p>
    <p><i class="fas fa-phone"></i> <a href="tel:+37125495188">+371 25 495 188</a></p>
    <p><i class="fab fa-github"></i> <a href="https://github.com/Noris000" target="_blank">Noris000</a></p>
</section>

    <footer>
        <p>&copy; 2023 Normunds Lazdiņš</p>
    </footer>
</body>
</html>