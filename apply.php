<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <link rel="stylesheet" href="styles/style.css" />
  </head>
  <body>
    <?php include 'header.inc'; ?>
      
    <div class="apply-banner">
      <h1><span>APPLY</span> NOW!</h1>
      <a href="#apply"><button> Get Started </button></a>
    </div>
    
    
    <main>
      <section class="application-form" id="apply">
        <h2>APPLICATION FORM</h2>
        <p id="apply">We’re excited to have you apply! Please complete the form below with your details so we can review your application and get back to you soon!</p>
        <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
            <div class="container">
              <label for="job-reference">Job Reference Number
              <div class="tooltip">?
                  <span class="tooltip-text">[Software Developer: SD001] - [Data Analyst: DA001] - [Senior Backend Engineer: SBE01] </span>
              </div>
              <input id="job-reference" name="job-reference" type="text" pattern="^[a-zA-Z0-9]{5}$" placeholder="SD001 // DA001 // SBE01"  required />
              </label>
            </div>
            
            <div class="row-container">
              <div>
                <label for="first-name">First Name
                <input id="first-name" name="first-name" type="text" pattern="^[a-zA-Z\s]{1,20}$" required />
                </label>
              </div>
              <div>
                <label for="last-name">Last Name
                <input id="last-name" name="last-name" type="text" pattern="^[a-zA-Z\s]{1,20}$" required />
                </label>
              </div>
            </div>

            <label for="birthday">Day of Birth 
            <input id="birthday" name="birthday" type="text" pattern="^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$" placeholder="dd/mm/yyyy" required />
            </label>

            <fieldset>
              <legend>Gender</legend>
              <input type="radio" id="gender" name="gender" value="male" required>Male
              <input type="radio" name="gender" id="gender" value="female" required>Female
              <input type="radio" id="gender" name="gender" value="male" required>Prefer not to say
            </fieldset>

            <div class="row-container">
              <div>
                <label for="street">Street Address
                <input id="street" name="street" type="text" pattern="^[a-zA-Z0-9\s,.'-]{1,40}$" required />
                </label>
              </div>
              <div>
                <label for="suburb">Suburb/Town
                <input id="suburb" name="suburb" type="text" pattern="^[a-zA-Z\s]{1,20}$" required />
                </label>
              </div>
            </div>

            <div class="row-container">
              <div>
                <label for="code">Postcode
                <input id="code" name="code" type="text" pattern="^\d{4}$" placeholder="4-digit Postal Code" required />
                </label>
              </div>
              <div class="state-select">
                <label for="state" id="state-text">State</label>
                <select id="state" name="state" required >
                 <option value="VIC">Victoria (VIC)</option>
                 <option value="NSW">New South Wales (NSW)</option>
                 <option value="QLD">Queensland (QLD)</option>
                 <option value="NT">Northern Territory (NT)</option>
                 <option value="WA">Western Australia (WA)</option>
                 <option value="SA">South Australia (SA)</option>
                 <option value="TAS">Tasmania (TAS)</option>
                 <option value="ACT">Australian Capital Territory (ACT)</option>
                </select>
              </div>
            </div>

            <div class="row-container">
              <div>
                <label for="email">Email Address
                <input id="email" name="email" type="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
                </label>
              </div>
              <div>
                <label for="phone">Phone Number
                <input id="phone" name="phone" type="tel" pattern="^[\d\s]{8,12}$" required />
                </label>
              </div>
            </div>
            
            <div class="skill-section">
              <label for="skill">Skills list
              </label>
              <div class="skills">
                <label>
                <input type="checkbox" name="skill-a"> Programming
                </label>
                <label>
                <input type="checkbox" name="skill-b"> Data Management & Database System
                </label>
                <label>
                <input type="checkbox" name="skill-c"> Machine Learning
                </label>
                <label>
                <input type="checkbox" id="other-skills-checkbox" name="other-skills-checkbox" class="other-skills inline"> Other skills
                </label>
                <textarea id="other-skills-textarea" placeholder="Type your other skills here..."></textarea>
                <p>Attention: Kindly ensure that all sections of the form are filled out, as they are mandatory.</p>
              </div>
            </div>

            <button type="submit" class="submit-btn">Apply</button>
            <div class="submitted-message"></div>
        </form>
      </section>
    </main>
    <hr>
    <?php include 'footer.inc'; ?>
  </body>
</html>
