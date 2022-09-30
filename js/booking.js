// Function to handle the booking appointment date so that cannot book past dates
const checkDate = () => {
    const today = new Date();

    let month = today.getMonth() + 1;
    let day = today.getDate();
    let year = today.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    const minDate = year + '-' + month + '-' + day;
    document.getElementById('date').setAttribute("min", minDate);
};
// Calling the above Check Date function
checkDate();


// Booking form appointment select element
const appointmentSelectElem = document.getElementById('booking-select');
// Booking form advice section 
const adviceSection = document.getElementById('advice');

// Adding an event to the select so that if it changes we can dynamically add HTML content inside advice section to preview in our UI
appointmentSelectElem.addEventListener('change', function handleChange(event) {
    if (event.target.value == 1) {
        adviceSection.innerHTML = `
        <p>A disclaimer that multiple vaccines are normally 
        administered in combination and may cause the child to be sluggish 
        or feverous for 24 – 48 hours afterwards.</p>
        <h4>Suggestions For Childhood Immunisation</h4>
            <ul>
                <li>Immunisation from an early age helps protect your child against serious childhood infections.</li>
                <li>The Immunisation Schedule Victoria outlines the vaccines your child needs and the age at which each vaccine should be given.</li>
                <li>Some groups are more at risk than others in the community and may need extra vaccines.</li>
                <li>Stay in the clinic with your child for at least 15 minutes after their immunisation to be sure there are no immediate side effects.</li>
                <li>Serious side effects or allergic reactions to the vaccines are rare.</li>
            </ul>
        `;
    }
    else if (event.target.value == 2) {
        adviceSection.innerHTML = `
        <p>The best time to get vaccinated is in April and May each 
        year for optimal protection over the winter months.</p>
        <h4>Influenza vaccination is particularly recommended for:</h4>
            <ul>
                <li>Children aged 6 months to <5 years.</li>
                <li>Adults aged ≥65 years</li>
                <li>Avoid alcohol, tea and coffee as these drinks can cause slight dehydration</li>
                <li>Aboriginal and Torres Strait Islander people.</li>
                <li>People with medical conditions that increase their risk of influenza.</li>
                <li>Homeless People</li>
                <li>Pregnant Women</li>
            </ul>
        `;
    }
    else if (event.target.value == 3) {
        adviceSection.innerHTML = `
        <p>Advice that everyone should arrange to have 
        their third shot as soon as possible and adults over the age of 30 
        should have their fourth shot to protect against new variant strains.</p>
        <h4>What You Need to Know</h4>
            <ul>
                <li>COVID-19 vaccine boosters can further enhance or restore protection that might have decreased over time after your primary series vaccination.</li>
                <li>People are protected best from severe COVID-19 illness when they stay up to date with their COVID-19 vaccines, which includes getting all recommended boosters when eligible.</li>
                <li>There are different COVID-19 vaccine recommendations for people who are moderately or severely immunocompromised.</li>
                <li>It is never too late to get the added protection offered by a COVID-19 booster. Find a vaccine provider.
                </li>
            </ul>
        `;
    }
    else if (event.target.value == 4) {
        adviceSection.innerHTML = `
        <p>That some tests require some fasting ahead of time and 
        that a staff member will advise them on this prior to the 
        appointment.</p>
        <h4>Preparing for a blood test</h4>
            <ul>
                <li>Avoid eating or drinking anything (fasting) apart from water, for up to 12 hours – read more about eating and drinking before having a blood test.</li>
                <li>Stop taking certain medicines.</li>
            </ul>
        `;
    }
});

// Booking Form Element
const bookingForm = document.getElementById('booking-form');
// Booking Form Input Checkboxes
const checkboxes = bookingForm.querySelectorAll('input[type=checkbox]');

// Booking Form Input First Checkbox 
const firstCheckbox = checkboxes.length > 0 ? checkboxes[0] : null;

// Function to check whether at least one checkbox is clicked or not
function isCheckboxChecked() {
    const form_data = new FormData(bookingForm);
    if (form_data.has("time[]")) {
        return true;
    }

    return false;
}


// Function checks whether character is a valid letter
const isLetter = (ch) => {
    return /^[A-Z]$/i.test(ch);
}

// Function to validate Patient ID
const validatePatientId = () => {
    const formIdField = document.getElementById('pid');
    const id = formIdField.value;

    const firstLetter = id.charAt(0);
    const secondLetter = id.charAt(1);

    // Checking whether first two letters of the id are valid letters or NOT
    if (isLetter(firstLetter) && isLetter(secondLetter)) {
        const number = id.substring(2, id.length - 1);
        // Checking whether it contains all digits or not
        if (/^\d+$/.test(number)) {
            //Calculating the sum of the number 
            let sum = 0;
            for (let i = 0; i < number.length; i++) {
                sum += parseInt(number[i]);
            }

            //Finding the required last letter according to our algorithm
            const chk = parseInt(sum % 26);

            let requiredLastLetter;
            if (chk == 0) {
                requiredLastLetter = 'Z';
            }
            else {
                requiredLastLetter = String.fromCharCode(97 + chk - 1).toUpperCase();
            }

            if (requiredLastLetter == id.charAt(id.length - 1)) {
                return true;
            }

        }
        else {
            return false;
        }
    }

    return false;
}


// Booking Form Submission
bookingForm.addEventListener('submit', function bookingSubmit(event) {

    // Validating Patient ID
    if (!validatePatientId()) {
          // Preventing reload
        event.preventDefault();
        alert("Please enter a valid patient ID");
        return;
    }
    // Checking whether at least one checkbox is clicked or not
    if (!isCheckboxChecked()) {
          // Preventing reload
        event.preventDefault();
        alert("Please select at least one time duration for appointment.");
        return;
    }
});