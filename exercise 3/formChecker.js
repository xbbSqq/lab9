
errCodeToMsg = [
    "The email address provided is in an invalid format.",
    "The password field is empty.",
    "An item quantity inputted is invalid.",
    "To submit an order, you must order at least one item.",
    "You must choose a shipping option."
]


function validate() {
    let emailIn = document.getElementById("email") ? document.getElementById("email").value : "";
    let passIn = document.getElementById("password") ? document.getElementById("password").value : "";
    let qty0 = parseInt(document.getElementById("item0qty").value);
    let qty1 = parseInt(document.getElementById("item1qty").value);
    let qty2 = parseInt(document.getElementById("item2qty").value);
    let qtys = [qty0, qty1, qty2];
    let shipOptEls = document.getElementsByName("shipCost");
    let shipCost = getShipOpt(shipOptEls) ? parseInt(getShipOpt(shipOptEls)) : null;

    let errBoolList = [
        isValidEmail(emailIn),
        isValidPass(passIn),
        isValidQtys(qtys),
        isGreaterThanQty0(qtys),
        choseShipOption(shipCost)
    ]

    let errCodes = ([0,1,2,3,4].reduce((otherErrorCodes, i) => {
        return( otherErrorCodes.concat(errBoolList[i] ? [] : [i]));
    }, []));

    if(errCodes.length > 0) {
        displayErrors(errCodes);
        return false;
    }
    else {
        
        return true;
    }

    return false;
}

function displayErrors(errCodeList) {
    let errMsg = errCodeList.reduce((combinedStr, code) => {
        return combinedStr + "\n" + errCodeToMsg[code];
    }, "Errors:\n");
    alert(errMsg);
}

function getShipOpt(els) {
    for(i=0; i<3; i++) {
        if(els[i].checked) {
            return els[i].value;
        }
    }
    return null;
}

function isValidEmail(str) {
    let re = /(\w+)@(\w+).com/;
    return re.test(str);
}

function isValidPass(str) {
    return( !str ? false : true );
}

function isValidQtys(qtyList) {
    return qtyList.every(qty => qty != null && qty >= 0);
}

function isGreaterThanQty0(qtyList) {
    return qtyList.some(i => i > 0);
}

function choseShipOption(val) {
    return (!(typeof(val) === "number") ? false : true);
}
