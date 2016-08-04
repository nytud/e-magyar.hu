var $xml;

function parseXML() {
    var callback = function (response) {
        $xml = $(response);
        var text = getTokens($xml);
        $("#text").html(text);
    };
    getXML("magyar1.xml", callback);
}

function getXML(url, callback) {
    var request = $.ajax({
        type: "GET",
        async: false,
        url: url,
        dataType: "xml",
        beforeSend: function () {

        }
    });
    request.done(function (response) {
        if (callback && typeof (callback) === 'function') {
            callback(response);
        }
    });
    request.fail(function (jqXHR, textStatus) {
        alert(jqXHR.status + " " + textStatus);
    });
}

function getTokens($xml) {
    var $root = $xml.find('AnnotationSet');
    var text = "";
    var sentence = {
        start: 0,
        end: 0
    };
    $root.find("Annotation").each(function (index, node) {
        var featureSet = {};
        var $node = $(node);
        var id = $node.attr("Id");
        var type = $node.attr("Type");
        if (type === "Sentence") {
            sentence.start = index === 0 ? parseInt($node.attr("StartNode")) - 1 : parseInt($node.attr("StartNode"));
            sentence.end = parseInt($node.attr("EndNode"));
            return true;
        }
        if (type === "Token") {
            var startNode = parseInt($node.attr("StartNode"));
            var endNode = parseInt($node.attr("EndNode"));
        }
        $(node).find("Feature").each(function (index, feature) {
            var $feature = $(feature);
            var name = $feature.find("Name").text();
            var value = $feature.find("Value").text();
            featureSet[name] = value;
        });
                
        var content = featureSet.string.search(/^[\.,;:?!]$/i) > -1 ? featureSet.string += "&nbsp;" : featureSet.string;

        var token = '<span id="' + id + '" class="' + type.toLowerCase() + '" data-anas="' + featureSet.anas + '">' + content + '</span>';

        if (sentence.start === startNode - 1) {
            token = '<span class="sentence">' + token;
        }
        if (sentence.end === endNode) {
            token = token + "</span>";
        }
        text += token;
    });
    return text;
}

function getAnnot(str, anas) {
    var labels = anas.split(";");
    var annot = "";
    annot = '<b>' + str + '</b><br>';
    annot += '<ol>';
    for(var i = 0; i < labels.length; i++) {        
        annot += '<li>' + labels[i] + '</li>';        
    }
    annot += '</ol>';    
    return annot;
}

$(document).ready(function () {
    
    $("#text").on("mouseenter", ".token", function () {
        var $token = $(this);
        var anas = $token.data("anas");  
        var str = $token.text();
        if(anas === undefined || anas === "") {
            return false;
        }       
        var annot = getAnnot(str, anas);        
        $("#annot").html(annot);
    });
    $("#text").on("mouseleave", ".token", function () {
        var $token = $(this);                       
    });
});