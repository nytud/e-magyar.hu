//create dependency tree
function createDepTree($modal, $sentence) {

    var html = "";
    html += '<div class="wrapper">';
    $.each($sentence.find(".token"), function (index, token) {
        var $token = $(token);
        html += '<span class="deptoken" data-id="' + $token.attr("id") + '" data-deptype="' + $token.data("deptype") + '" data-target_id="' + $token.data("target_id") + '">' + $(token).text() + '</span>';
    });
    html += '</div>';

    $modal.html(html);

    var sentenceWidth = 0;
    $.each($modal.find(".deptoken"), function (index, deptoken) {
        sentenceWidth += $(deptoken).outerWidth();
    });
    $modal.find(".wrapper").width(sentenceWidth + 20);

    var $deptokens = $modal.find(".deptoken");
    var elements = "";
    //add curves, labels and arrows
    $.each($deptokens, function (index, deptoken) {
        var $deptoken = $(deptoken);
        var id = $deptoken.data('id');
        var targetId = $deptoken.data('target_id');
        var deptype = $deptoken.data('deptype');
        if (id !== "" && targetId !== "") {
            var $targetCell = $modal.find(".deptoken[data-id=" + targetId + "]");
            var position = $deptoken.position();
            var width = $deptoken.outerWidth();
            var targetPosition = $targetCell.position();
            var targetWidth = $targetCell.outerWidth();
            var centerX = position.left + width / 2;
            var centerY = position.top;
            var targetCenterX = targetPosition.left + targetWidth / 2;
            var targetCenterY = targetPosition.top;
            var distance = Math.abs(targetCenterX - centerX) / 5;
            var middle = centerX + Math.abs(targetCenterX - centerX) / 2;
            var curveX = targetId >= id ? centerX + distance : centerX - distance;
            var curveY = centerY - distance;
            var targetCurveX = targetId > id ? targetCenterX - distance : targetCenterX + distance;
            var targetCurveY = targetCenterY - distance;
            elements += '<path d="M' + centerX + ' ' + centerY + ' C' + curveX + ' ' + curveY + ', ' + targetCurveX + ' ' + targetCurveY + ', ' + targetCenterX + ' ' + targetCenterY + '" style="stroke:rgb(0,82,131);stroke-width:1;fill:transparent;" />';
            elements += '<text x="0" y="0" fill="black" font-size="8">' + (deptype || "") + '</text>';
            elements += '<polygon points="" fill="rgb(0, 82, 131)" data-orient="' + (targetId >= id ? 'right' : 'left') + '" />';
        }
    });
    var svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width: ' + sentenceWidth + 'px">' + elements + '</svg>';
    //append svg to modal
    $modal.append(svg);
    var webkit = false;

    if (navigator.userAgent.indexOf('AppleWebKit') !== -1) {
        webkit = true;
    }

    //find max curve height
    var maxHeight = 0;
    $.each($modal.find("path"), function (index, curve) {
        var box = $(curve)[0].getBBox();
        if (box.height >= maxHeight) {
            maxHeight = box.height;
        }
    });
    //adjust dialog height
    var ymodifier = 0;
    $modal.find(".wrapper").css('margin-top', (maxHeight + 10));
    $modal.find("svg").css('height', (maxHeight + 50) + "px");
    var ymodifier = maxHeight;
    //reposition elements
    $.each($modal.find("path"), function (index, curve) {
        var $curve = $(curve);
        var box = $curve[0].getBBox();
        var $label = $modal.find("text:eq(" + index + ")");
        var text = $label.text();
        var half = (text.length / 2) * 5;
        var tmodifier = webkit ? box.height / 4 : 0;
        $modal.find("text:eq(" + index + ")").attr({
            'y': box.y + 12 + tmodifier,
            'x': box.x + (box.width / 2) - half
        });
        var middle = box.x + box.width / 2;
        var $polygon = $modal.find("polygon:eq(" + index + ")");
        var orient = $polygon.data("orient");
        var pmodifier = orient === "left" ? -3 : 3;
        $polygon.attr({
            'points': (middle + pmodifier) + ", " + (box.y + tmodifier) + " " + (middle + (-1 * pmodifier)) + ", " + ((box.y - 3) + tmodifier) + " " + (middle + (-1 * pmodifier)) + ", " + ((box.y + 3) + tmodifier)
        });
    });
    $modal.find("path, text, polygon").css({
        'transform': 'translateY(' + ymodifier + 'px)',
        '-moz-transform': 'translateY(' + ymodifier + 'px)',
        '-o-transform': 'translateY(' + ymodifier + 'px)',
        '-ms-transform': 'translateY(' + ymodifier + 'px)',
        '-webkit-transform': 'translateY(' + ymodifier + 'px)'
    });

    //IE and Edge hack
    var $svgelements = $modal.find("path, text, polygon");
    $.each($svgelements, function (index, elem) {
        var transform = getComputedStyle(elem).getPropertyValue('transform');
        elem.setAttribute('transform', transform);
    });

    $modal.dialog("option", "position", {my: "center", at: "center", of: window});
}