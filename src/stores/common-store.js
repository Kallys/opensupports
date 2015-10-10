import Reflux             from 'reflux';

import CommonActions      from 'actions/common-actions';

var CommonStore = Reflux.createStore({

    init() {
        this.language = 'en';

        this.listenTo(CommonActions.changeLanguage, this.changeLanguage);
    },

    changeLanguage(lang) {
        this.language = lang;
        this.trigger('i18n');
    }
});

export default CommonStore;