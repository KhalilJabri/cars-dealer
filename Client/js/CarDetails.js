function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'flex';
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none';
}

// ------------------------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
    setDefaultDateTimePicker();
    setDefaultDateTimeDeposit();
    
    
    let datepicker = setTime(document.getElementById('datePicker').value);
    document.getElementById('timeTitlePickUp').innerText = datepicker;

    let datedropoff = setTime(document.getElementById('dateDeposit').value);
    document.getElementById('timeTitleDropOff').innerText = datedropoff;

});

// ----------------------------------------------------
//  Set default date and time picker
// ----------------------------------------------------

function setDefaultDateTimePicker() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');

    const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    // console.log(formattedDateTime);
    document.getElementById('datePicker').value = formattedDateTime;
}

// ----------------------------------------------------
//  Set default date and time Deposit
// ----------------------------------------------------

function setDefaultDateTimeDeposit() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');

    const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    // console.log(formattedDateTime);
    document.getElementById('dateDeposit').value = formattedDateTime;
}

//-----------------------------------------------------
// change pick up date on the confirmation panel
//-----------------------------------------------------

function changePickUpDate() {
    let pickerDate = setTime(document.getElementById('datePicker').value);
    document.getElementById('timeTitlePickUp').innerText = pickerDate;

}

//-----------------------------------------------------
// change deposit date on  the confirmation panel
//-----------------------------------------------------

function changeDepositDate() {
    let dropDate = setTime(document.getElementById('dateDeposit').value);
    document.getElementById('timeTitleDropOff').innerText = dropDate;
}

function setTime(d) {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    let date = new Date(d);
    const monthName = months[date.getMonth()];
    const day = date.getDate();
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const ampm = hours >= 12 ? 'PM' : 'AM';
    const formattedHours = hours % 12 === 0 ? 12 : hours % 12;
    const formattedMinutes = minutes.toString().padStart(2, '0');
    let xx = `${monthName} ${day}, ${year} at ${formattedHours}:${formattedMinutes} ${ampm}`;
    // console.log('zzzzzzzzzzzz', xx)
    return xx;
}