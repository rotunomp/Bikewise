const hideSpeed = 400;
const showSpeed = 400;
const fadeOutSpeed = 400;
const fadeInSpeed = 400;
const slideUpSpeed = 400;
const slideDownSpeed = 400;

var totalPrice = 0;
var bikePrice = 0;
var packagePrice = 0;
var lightPrice = 0;
var kickstandPrice = 0;
var backPrice = 0;
var lockPrice = 0;
var otherAccsPrice = 0;



// <!-- Script to handle hiding of divs to simulate progression through pages -->
function hide() {
    $("#error").hide();
    $("#pagePackage").hide();
    $("#pageAccs").hide();
    $("#userInfo").hide();
    $("#confirmRental").hide();
    $(".userData").hide();
    $("#terms").hide();
    $("#sign").hide();
    $("#sub").hide();
    $("#receipt").hide();
    $("#default").hide();
    $("#rentalLength").hide();
    $("#permahide").hide();
    $(window).scrollTop(0);
}

function hideDefault() {
    $('#default').hide(hideSpeed);
    $("#rentalLength").show(showSpeed);
    getPriceOfRental();
    $(window).scrollTop(0);
}

function hideDefaultRev() {
    $('#default').show(showSpeed);
    $("#rentalLength").hide(hideSpeed);
    $(window).scrollTop(0);
}

function hideRentalLength() {
    $('#rentalLength').hide(hideSpeed);
    $('#pagePackage').show(showSpeed);
    $(window).scrollTop(0);
}

function hideRentalLengthRev() {
    $('#rentalLength').show(showSpeed);
    $('#pagePackage').hide(hideSpeed);
    $(window).scrollTop(0);
}

function hide1() {
    $('#pagePackage').hide(hideSpeed);
    $("#pageAccs").show(showSpeed);
    getPriceOfRental();
    $(window).scrollTop(0);
}

function hideRev1() {
    $('#pagePackage').show(showSpeed);
    $("#pageAccs").hide(hideSpeed);
    $(window).scrollTop(0);
}

function hideSelectedPack() {
    $('#pagePackage').hide(hideSpeed);
    $('#userInfo').show(showSpeed);
    getPriceOfRental();
    $(window).scrollTop(0);
}

function hide2() {
    $('#pageAccs').hide(hideSpeed);
    $("#userInfo").show(showSpeed);
    $(window).scrollTop(0);
}

function hideRev2() {
    $('#userInfo').hide(hideSpeed);
    $("#pagePackage").show(showSpeed);
    $(window).scrollTop(0);
}

function hide3() {
    if(validateUserInfo()) {
        $('#userInfo').hide(hideSpeed);
        $('.userData').show(showSpeed);
        $(window).scrollTop(0);
    }
}

function hideRev3() {
    $('#userInfo').show(showSpeed);
    $("#confirmRental").hide(hideSpeed);
    $(window).scrollTop(0);
}

function hide4() {
    $('#confirmRental').hide(hideSpeed);
    $(".userData").show(showSpeed);
    $(window).scrollTop(0);
}

function hideRev4() {
    $('.userData').hide(hideSpeed);
    $('#userInfo').show(showSpeed);
    $(window).scrollTop(0);
}

function hide5() {
    if(validateUserData()) {
        $('.userData').hide(hideSpeed);
        $("#sign").show(showSpeed);
        $(window).scrollTop(0);
    }
}

function hideRev5() {
    $('#sign').hide(hideSpeed);
    $(".userData").show(showSpeed);
    $(window).scrollTop(0);
}

function setBikeSelected(bikeId) {
    document.getElementById('bikeSelected').value = bikeId;
    var bikes = document.getElementsByClassName('bike');

    var bikeLen = bikes.length;
    var k = 0;
    for (k; k < bikeLen; k++) {
        if (bikes[k].classList.contains('bg-gray-300')) {
            bikes[k].classList.remove('bg-gray-300');
            bikes[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('bike' + bikeId).classList.remove('border-left-primary');
    document.getElementById('bike' + bikeId).classList.add('bg-gray-300');

    hideDefault();
}

function setPackageSelected(packageId) {
    document.getElementById('package').value = packageId;
    var packages = document.getElementsByClassName('package');

    var packageLen = packages.length;
    var k = 0;
    for (k; k < packageLen; k++) {
        if (packages[k].classList.contains('bg-gray-300')) {
            packages[k].classList.remove('bg-gray-300');
            packages[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('package' + packageId).classList.remove('border-left-primary');
    document.getElementById('package' + packageId).classList.add('bg-gray-300');

    hideSelectedPack();
}

function setCustomSelected() {
    document.getElementById('package').value = "custom";
    getPriceOfRental();
    $(window).scrollTop(0);
    hide1();
}

function setLightSelected(lightID) {
    var ligs = document.getElementsByClassName('light');
    var liLen = ligs.length;
    var k = 0;
    for (k; k < liLen; k++) {
        if (ligs[k].classList.contains('bg-primary')) {
            ligs[k].classList.remove('bg-primary');
            ligs[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('light' + lightID).classList.remove('border-left-primary');
    document.getElementById('light' + lightID).classList.add('bg-primary');
    document.getElementById('lightSel').value = lightID;
    getPriceOfRental();
}

function setBackSelected(backID) {
    var bacs = document.getElementsByClassName('back');
    var bLen = bacs.length;
    var k = 0;
    for (k; k < bLen; k++) {
        if (bacs[k].classList.contains('bg-primary')) {
            bacs[k].classList.remove('bg-primary');
            bacs[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('back' + backID).classList.remove('border-left-primary');
    document.getElementById('back' + backID).classList.add('bg-primary');
    document.getElementById('backSel').value = backID;
    getPriceOfRental();

}

function setKickstandSelected(kickID) {
    var kicks = document.getElementsByClassName('kick');
    var kLen = kicks.length;
    var k = 0;
    for (k; k < kLen; k++) {
        if (kicks[k].classList.contains('bg-primary')) {
            kicks[k].classList.remove('bg-primary');
            kicks[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('kick' + kickID).classList.remove('border-left-primary');
    document.getElementById('kick' + kickID).classList.add('bg-primary');
    document.getElementById('kickstandSel').value = kickID;
    getPriceOfRental();

}

function setLockSelected(lockID) {
    var locks = document.getElementsByClassName('lock');
    var loLen = locks.length;
    var k = 0;
    for (k; k < loLen; k++) {
        if (locks[k].classList.contains('bg-primary')) {
            locks[k].classList.remove('bg-primary');
            locks[k].classList.add('border-left-primary');
        }
    }
    document.getElementById('lock' + lockID).classList.remove('border-left-primary');
    document.getElementById('lock' + lockID).classList.add('bg-primary');
    document.getElementById('lockSel').value = lockID;
    getPriceOfRental();

}

function setOthersSelected(otherID) {
    if (document.getElementById('other' + otherID).classList.contains('bg-primary')) {
        // For removing the price to the otherPrices array
        document.getElementById('other' + otherID).classList.remove('bg-primary');
        document.getElementById('other' + otherID).classList.add('border-left-primary');
        document.getElementById('otherSel' + otherID).checked = false;
        for (var y = 0; y < otherPrices.length; y++) {
            if (otherPrices[y] == otherArray[otherID]) {
                otherPrices[y] = '0';
            }
        }
    } else {
        // For adding the price to the otherPrices array
        document.getElementById('other' + otherID).classList.remove('border-left-primary');
        document.getElementById('other' + otherID).classList.add('bg-primary');
        document.getElementById('otherSel' + otherID).checked = true;
        for (var t = 0; t < otherPrices.length; t++) {
            if (otherPrices[t] == '0') {
                otherPrices[t] = otherArray[otherID];
                break;
            }
        }
    }
    getPriceOfRental();
}

// <!--
//
//     SETTING THE PRICE!!!!
//
//     Create a function that will grab all currently selected accessories and parse the field that contains the price
//
//     Parse the innerHTML of the fields on $ and grab the resulting number from that parse.
//
//     Make ONE method that will grab everything on each "page" change.
//
//
// -->
function getPriceOfRental() {
    if (document.getElementById('bikeSelected').value != "") {

        bikePrice = bikeArray[Number(document.getElementById('bikeSelected').value)];

        if (document.getElementById('package').value != '') {
            if (document.getElementById('package').value != 'custom') {
                packagePrice = Number(packArray[Number(document.getElementById('package').value)]);
            } else {

                lightPrice = lightArray[Number(document.getElementById('lightSel').value)];

                kickstandPrice = kickArray[Number(document.getElementById('kickstandSel').value)];

                backPrice = backArray[Number(document.getElementById('backSel').value)];

                lockPrice = lockArray[Number(document.getElementById('lockSel').value)];

                otherAccsPrice = 0;
                for (var m = 0; m < otherPrices.length; m++) {
                    otherAccsPrice += Number(otherPrices[m]);
                }
            }
        }

    }

    totalPrice = Number(bikePrice);
    if(document.getElementById('package').value == 'custom') {
        totalPrice += Number(lightPrice) + Number(lockPrice) + Number(kickstandPrice) + Number(backPrice) + Number(otherAccsPrice);
    }
    else {
        totalPrice += Number(packagePrice);
    }
    $('#runningTotal').html('$' + totalPrice);
    document.getElementById('price').value = totalPrice;
}

function formCheckAddress() {
    if (document.getElementById("userHomeAddr").valueOf() == "" || document.getElementById("userHomeCity").valueOf() == "" ||
        document.getElementById("userHomeZip").valueOf() == "" || document.getElementById("userHomeState").valueOf() == "" ||
        document.getElementById("userEmail").valueOf() == "" || document.getElementById("userLocalAddr").valueOf() == "" ||
        document.getElementById("userHomePhone").valueOf() == "" || document.getElementById("userLocalPhone").valueOf() == "" ||
        document.getElementById("cellPhone").valueOf() == "" || document.getElementById("driversLicenseNumber").valueOf() == "" ||
        document.getElementById("stateOfDriversLicense").valueOf() == "") {
        $("#error").show();
        return false;
    }
    $("#error").hide();
    return true;
}

function formCheckNameHeight() {
    if (document.getElementById("fstName").value == "" || document.getElementById("lstName").value == "" ||
        document.getElementById("height").value == "") {
        $("#error").show();
        return false;
    }
    $("#error").hide();
    return true;
}

/*

Validating that each necessary section of the form is filled before moving on to the next page

 */

function validateUserInfo()
{
    var firstName=document.forms["custom"]["fstName"].value;
    var lastName=document.forms["custom"]["lstName"].value;
    var height=document.forms["custom"]["height"].value;
    var gender=document.forms["custom"]["gender"].value;
    if (firstName==null || firstName=="" || lastName==null || lastName=="" || height==null || height=="" || gender==null || gender=="")
    {
        alert("Please Fill All Required Fields");
        return false;
    }
    return true;
}

function validateUserData()
{
    var userHomeAddr=document.forms["custom"]["userHomeAddr"].value;
    var userHomeCity=document.forms["custom"]["userHomeCity"].value;
    var userHomeState=document.forms["custom"]["userHomeState"].value;
    var userHomeZip=document.forms["custom"]["userHomeZip"].value;
    var userHomePhone=document.forms["custom"]["userHomePhone"].value;
    var userLocalAddr=document.forms["custom"]["userLocalAddr"].value;
    var userLocalPhone=document.forms["custom"]["userLocalPhone"].value;
    var cellPhone=document.forms["custom"]["cellPhone"].value;
    var driversLicenseNumber=document.forms["custom"]["driversLicenseNumber"].value;
    var stateOfDriversLicense=document.forms["custom"]["stateOfDriversLicense"].value;
    var userEmail=document.forms["custom"]["userEmail"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (userHomeAddr==null || userHomeAddr=="" ||
        userHomeCity==null || userHomeCity=="" ||
        userHomeState==null || userHomeState=="" ||
        userHomeZip==null || userHomeZip=="" ||
        userHomePhone==null || userHomePhone=="" ||
        userLocalAddr==null || userLocalAddr=="" ||
        userLocalPhone==null || userLocalPhone=="" ||
        cellPhone==null || cellPhone=="" ||
        driversLicenseNumber==null || driversLicenseNumber=="" ||
        stateOfDriversLicense==null || stateOfDriversLicense=="" ||
        !userEmail.match(mailformat)
    )
    {
        alert("Please Fill All Required Fields");
        return false;
    }
    return true;
}

function validateSignature()
{
    var userName=document.forms["custom"]["userName"].value;
    if (userName==null || userName=="" ||
        !document.getElementById('priceAgreement').checked ||
        !document.getElementById('termAgree').checked
    )
    {
        alert("Please Fill All Required Fields");
        return false;
    }
    document.forms["custom"].submit();// Form submission
}


