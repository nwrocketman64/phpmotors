'use strict' 
 
// Get a list of vehicles in inventory based on the classificationId 
let classificationList = document.querySelector("#classificationList"); 
classificationList.addEventListener("change", function () { 
    let classificationId = classificationList.value; 
    console.log(`classificationId is: ${classificationId}`); 
    let classIdURL = "/vehicles/index.php?action=getInventoryItems&classificationId=" + classificationId; 
    fetch(classIdURL) 
    .then(function (response) { 
        if (response.ok) { 
            return response.json(); 
        } 
        throw Error("Network response was not OK"); 
    }) 
    .then(function (data) { 
        console.log(data); 
        buildInventoryList(data); 
    }) 
    .catch(function (error) { 
        console.log('There was a problem: ', error.message) 
    }) 
})

// Build inventory items into HTML table components and inject into DOM 
function buildInventoryList(data) { 
    let inventoryDisplay = document.getElementById("inventoryDisplay"); 
    // Set up the table labels 
    let dataTable = '<thead>'; 
    dataTable += '<tr><th>Vehicle Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>'; 
    dataTable += '</thead>'; 
    // Set up the table body 
    dataTable += '<tbody>'; 
    // Iterate over all vehicles in the array and put each in a row 
    data.forEach(function (element) { 
        console.log(element.invId + ", " + element.invModel); 
        dataTable += `<tr><td>${element.invMake} ${element.invModel}</td>`; 
        dataTable += `<td><a href='/vehicles?action=mod&id=${element.invId}' title='Click to modify'>Modify</a></td>`; 
        dataTable += `<td><a href='/vehicles?action=del&id=${element.invId}' title='Click to delete'>Delete</a></td></tr>`; 
    }) 
    dataTable += '</tbody>'; 
    // Display the contents in the Vehicle Management view 
    inventoryDisplay.innerHTML = dataTable; 
}