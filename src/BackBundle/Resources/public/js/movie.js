var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('.add-tag-button');
var $newLinkLi = $('<li></li>').append($addTagButton);

$(document).ready(function () {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('table.actors tbody');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagButton.on('click', function (e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });

    $('.submit-add-actor').on('submit', function (e) {
        var body = $(this).parent().parent().parent().find('.modal-body').html();
        var index = $collectionHolder.find('tr').length + 1;
        var label = $(body).find('input').html();
        $('#container').append(createModal(body, index));
        $collectionHolder.append(createRowTable(index, label));
        $('.modal-creation-actor').modal('hide');
        e.preventDefault();
    });

});

function createModal(body, index) {
    return '                <div class="modal fade modal-actor" id="exampleModal' + index + '" role="dialog"\n' +
        '                     aria-labelledby="exampleModalLabel" >\n' +
        '                    <div class="modal-dialog" role="document">\n' +
        '                        <div class="modal-content">\n' +
        '                            <div class="modal-header">\n' +
        '                                <h5 class="modal-title" id="exampleModalLabel">Acteur</h5>\n' +
        '                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
        '                                    <span aria-hidden="true">&times;</span>\n' +
        '                                </button>\n' +
        '                            </div>\n' +
        '                            <div class="modal-body">\n' + body +
        '                            </div>\n' +
        '                            <div class="modal-footer">\n' +
        '                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\n' +
        '                                <button type="button" class="btn btn-primary submit-actor">Modifier</button>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>';
}

function createRowTable(index, label) {
    return '<tr>\n' +
        '                <td>\n' + label +
        '                </td>\n' +
        '                <td>\n' +
        '                    <button type="button" class="btn btn-secondary modal-edit-actor" data-toggle="modal"\n' +
        '                            data-target="#exampleModal' + index + '">\n' +
        '                        Modifier\n' +
        '                    </button>\n' +
        '                </td>\n' +
        '                </tr>\n'
        ;

}

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);
    var newIndex = index + 1;
    // Display the form in the page in an li, before the "Add a tag" link li
    $('.modal-creation-actor .modal-body').html(newForm);
    $('.modal-creation-actor').modal();
}

