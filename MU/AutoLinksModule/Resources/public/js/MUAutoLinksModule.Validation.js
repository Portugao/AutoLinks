'use strict';

function mUAutoLinksValidateNoSpace(val) {
    var valStr;
    valStr = new String(val);

    return (valStr.indexOf(' ') === -1);
}

/**
 * Runs special validation rules.
 */
function mUAutoLinksExecuteCustomValidationConstraints(objectType, currentEntityId) {
}
