<div class="container w-25">
    <header class="header">
        <h1 id="title" class="text-center">freeCodeCamp Survey Form</h1>
        <p id="description" class="description text-center">Thank you for taking the time to help us improve the
            platform</p>
    </header>
    <form method="post" id="survey-form" action="/survey">
        <div class="form-group pb-2">
            <label id="name-label" for="name">Name</label>
            <input type="text" value="name" name="name" id="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="form-group pb-2">
            <label id="email-label" for="Email">Emai</label>
            <input type="email" name="email" id="email" class="form-control" value="dsdsd@dsds.rs" placeholder="Enter your email" required>
        </div>
        <div class="form-group pb-2">
            <label id="number-label" for="number">Age
                <span class="clue">(optional)</span>
            </label>
            <input type="number" value="19" name="age" id="number" min="18" max="99" class="form-control" placeholder="How old are you">
        </div>
        <div class="form-group pb-2">
            <p class="text-style">Your current role?</p>
            <select class="form-select" name="role" aria-label="Default select example" required>
                <option disabled selected value>Select current role</option>
                <option value="student">Student</option>
                <option value="job">Full Time Job</option>
                <option value="learner">Three</option>
                <option value="preferNo">Prefer not to say</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group pb-2">
            <p class="text-style">Would you recommend freeCodeCamp to a friend?</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="recomend" value="definitely" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1" ">
                        Definitely
                    </label>
                </div>
                <div class=" form-check">
                    <input class="form-check-input" type="radio" name="recomend" value="definitely" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2" ">
                        Maybe
                    </label>
                </div>
                <div class=" form-check">
                        <input class="form-check-input" type="radio" name="recomend" value="not-sure" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3" ">
                        Not Sure
                    </label>
                </div>
            </div>
            <div class=" form-group pb-2">
                            <p class="text-style">What is your favorite feature of freeCodeCamp?</p>
                            <select class="form-select" name="improve" aria-label="Default select example" required>
                                <option disabled selected value>Select an option</option>
                                <option value="challenges">Challenges</option>
                                <option value="projects">Projects</option>
                                <option value="commuinity">Commuinity</option>
                                <option value="open-source">Open Source</option>
                            </select>
            </div>
            <div class="pb-2">
                <p id="title-improved">What would you like to see improved?
                    <span class="clue">(Check all that apply)</span>
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="front-end" id="front">
                    <label class="form-check-label" for="front">
                        Front-end Projects
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="backend" id="back">
                    <label class="form-check-label" for="back">
                        Back-end Projects
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="data" id="data">
                    <label class="form-check-label" for="data">
                        Data visualization
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="challenges">
                    <label class="form-check-label" for="challenges">
                        Challenges
                    </label>
                </div>
            </div>
            <div class="form-floating pb-2">
                <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <div class="form-group pb-2">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>