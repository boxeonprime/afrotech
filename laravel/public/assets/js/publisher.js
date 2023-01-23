
// Publisher.js



function insertAfter(newNode, existingNode) {

    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

function listEditor() {
    var div = document.createElement("div");
    var a = document.createElement("a");
    a.href = "#/";
    a.setAttribute("onclick", "createListItem(this)");
    a.className = "point-7-em-font";
    a.innerText = "+List item";
    var a2 = document.createElement("a");
    a2.href = "#/";
    a2.setAttribute("onclick", "removeItem(this)");
    a2.className = "point-7-em-font";
    a2.innerText = "-List item";
    div.appendChild(a);
    var sp = document.createTextNode("\u00A0|\u00A0");
    div.appendChild(sp);
    div.appendChild(a2);
    return div;

}

function createParagraph(a) {


    var p = a.parentNode.parentNode;
    var clone = p.cloneNode(true);
    insertAfter(clone, p);
    clone.getElementsByTagName("textarea")[0].value = "";
    clone.getElementsByTagName("textarea")[0].focus();
   
    updateIDS(a);

}
function copyPreviousParagraph(a){

    var p = document.getElementsByTagName("textarea");
    var p = p[p.length -1];
    var clone = p.parentNode.cloneNode(true);
    var loc = a.parentNode.parentNode;

    insertAfter(clone, loc);
    clone.getElementsByTagName("textarea")[0].value = "";
    clone.getElementsByTagName("textarea")[0].focus();
   
    updateIDS(a);

}
function updateIDS(a) {

    let section = a.getAttribute("data-type-section");
   
 
    var div = document.getElementsByClassName(section); 
  
    var count = div.length;  
   
    for (var i = 0; i < count; i++) {

        div[i].setAttribute("data-type-parent", i);
        
        var lnks = div[i].getElementsByTagName("a");
        for(var e=0; e < lnks.length; e++){

            lnks[e].setAttribute("data-type-parent", i)
        }

    }
}

function createItem(a) {

    var section = a.getAttribute("data-type-section");
    var parent = a.getAttribute("data-type-parent");
    var name = `[sub]${[section]}${[parent]}[]`;

    var p = a.parentNode.parentNode;
    var clone = p.cloneNode(true);
    insertAfter(clone, p);
    clone.getElementsByTagName("input")[0].value = "";
    clone.getElementsByTagName("input")[0].focus();

}
function createListItem(a) {

    var section = a.getAttribute("data-type-section");
    var parent = a.getAttribute("data-type-parent");
    var name = "sub" + section + parent + "[]";

    var p = a.parentNode.parentNode;
    var clone = p.cloneNode(true);
    insertAfter(clone, p);
    clone.getElementsByTagName("input")[0].value = "";
    clone.getElementsByTagName("input")[0].focus();

}

function subheadingEditor() {
    var div = document.createElement("div");
    var a = document.createElement("a");
    a.href = "#/";
    a.setAttribute("onclick", "removeSubheading(this)");
    a.className = "point-7-em-font";
    a.innerText = "-Subheading";
    div.appendChild(a);
    return div;

}

function createList(a) {

    var section = a.getAttribute("data-type-section");
    var parent = a.getAttribute("data-type-parent");

    var div = document.createElement("div");
    var ul = document.createElement("input");
    ul.type = "text";
    ul.value = "";
    ul.name = `ul[${section}][${parent}][]`;
    ul.setAttribute("placeHolder", "(List item)");

    div.appendChild(ul);
    div.appendChild(listEditor());
    var p = a.parentNode;
    p.appendChild(div);
    insertAfter(div, p);
    ul.focus();
}

function removeList(a) {

    var p = a.parentNode.parentNode;
    p.remove();

}

function createSubheading(a) {

    var section = a.getAttribute("data-type-section");
    var parent = a.getAttribute("data-type-parent");

    var div = document.createElement("div");
    var h4 = document.createElement("input");
    h4.type = "text";
    h4.value = "";
    h4.name = `sub[${section}][${parent}][]`;
    h4.setAttribute("placeHolder", "(Subheading)");

    div.appendChild(h4);
    div.appendChild(subheadingEditor());
    var p = a.parentNode;
    p.appendChild(div);
    insertAfter(div, p);
    h4.focus();

}

function removeParagraph(a) {

    var p = a.parentNode.parentNode;
    p.remove();
    updateIDS(a);

}

function removeItem(a) {

    var p = a.parentNode.parentNode;
    p.remove();

}
function removeTopic(a) {

    var p = a.parentNode.parentNode;
    p.remove();

}
function removeSubheading(a) {

    var p = a.parentNode.parentNode;
    p.remove();

}
