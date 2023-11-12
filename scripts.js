function openTab(event, tabName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");

    if (tabName === 'tab1') {
        loadCountryContent(); 
    }
    if (tabName === 'tab2') {
        loadCityContent(); 
    }
    if (tabName === 'tab3') {
        loadCountryLenguages(); 
    }
    if (tabName === 'tab4') {
        loadQuerys(); 
    }
}

function loadCountryContent() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tab1").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "country/country.php", true);
    xhr.send();
}

function loadCityContent(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tab2").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "city/city.php", true);
    xhr.send();
}

function loadCountryLenguages(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tab3").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "countrylenguages/countrylenguages.php", true);
    xhr.send();
}

function loadQuerys(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tab4").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "Query/querys.php", true);
    xhr.send();
}