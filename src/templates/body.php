

<body translate="no">
<div class="container">
    <header class="header">
        <h1 id="title" class="text-center">freeCodeCamp Survey Form</h1>
        <p id="description" class="description text-center">Thank you for taking the time to help us improve the
            platform</p>
    </header>
    <form method="post" id="survey-form" action="/survey">
        <div class="form-group">
            <label id="name-label" for="name">Name</label>
            <input type="text" value="name" name="name" id="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label id="email-label" for="Email">Emai</label>
            <input type="email" name="email" id="email" class="form-control" value = "dsdsd@dsds.rs" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label id="number-label" for="number">Age
                <span class="clue">(optional)</span>
            </label>
            <input type="number" value="19" name="age" id="number" min="18" max="99" class="form-control" placeholder="How old are you">
        </div>
        <div class="form-group">
            <p class="text-style">Your current role?</p>
            <select id="dropdown" name="role" class="form-control choice-menu" required>
                <option disabled selected value>Select current role</option>
                <option value="student">Student</option>
                <option value="job">Full Time Job</option>
                <option value="learner">Full time learner</option>
                <option value="preferNo">Prefer not to say</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <p class="text-style">Would you recommend freeCodeCamp to a friend?</p>
            <label>
                <input name="user-reccomend" value="definitely" type="radio" class="input-radio" checked>Definitely
            </label>
            <label>
                <input name="user-reccomend" value="maybe" type="radio" class="input-radio" checked>Maybe
            </label>
            <label>
                <input name="user-reccomend" value="not=sure" type="radio" class="input-radio" checked>Not sure
            </label>
        </div>
        <div class="form-group">
            <p class="text-style">What is your favorite feature of freeCodeCamp?</p>
            <select name="improve" class="form-control choice-menu" id="choice-improve" required>
                <option disabled selected value>Select an option</option>
                <option value="challenges">Challenges</option>
                <option value="projects">Projects</option>
                <option value="commuinity">Commuinity</option>
                <option value="open-source">Open Source</option>
            </select>
        </div>
        <div>
            <p id="title-improved">What would you like to see improved?
                <span class="clue">(Check all that apply)</span>
            </p>
            <label>
                <input type="checkbox" name="prefer" value="front-end-projects" class="input-checkbox">Front-end
                Projects</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="back-end-projects" class="input-checkbox">Back-end
                Projects</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="Data visualization" class="input-checkbox">Data
                visualization</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="challenges" class="input-checkbox">Challenges</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="open-source-community" class="input-checkbox">Open
                Source Commuinity</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="gitter-help-rooms" class="input-checkbox">Git help
                rooms</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="videos" class="input-checkbox">Videos</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="city-meetups" class="input-checkbox">City
                Meetups</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="wiki" class="input-checkbox">Wiki</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="forum" class="input-checkbox">Forum</input>
            </label>
            <label>
                <input type="checkbox" name="prefer" value="additional-courses" class="input-checkbox">Additional
                Courses</input>
            </label>

        </div>
        <div class="form-group">
            <p id="title-comments">Any comments or suggestions?</p>
            <textarea name="comment" id="comments" class="input-textarea"
                      placeholder="Enter your comment here.."></textarea>
        </div>
        <div class="form-group">
            <button type="submit" id="submit" class="submit-button">Submit</button>
        </div>
    </form>
</div>
</body>