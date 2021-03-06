import React from 'react';

import store from 'app/store';
import ConfigActions from 'actions/config-actions';
import i18n from 'lib-app/i18n';

import Header from 'core-components/header';
import Message from 'core-components/message';

class InstallStep6Completed extends React.Component {

    componentDidMount() {
        store.dispatch(ConfigActions.init());

        setTimeout(() => {
            store.dispatch(ConfigActions.checkInstallation());
        }, 3000);
    }

    render() {
        return (
            <div className="install-step-6">
                <Header title={i18n('STEP_TITLE', {title: i18n('COMPLETED'), current: 6, total: 6})} description={i18n('STEP_6_DESCRIPTION')}/>
                <Message title={i18n('INSTALLATION_COMPLETED')} type="success">
                    {i18n('INSTALLATION_COMPLETED_DESCRIPTION')}
                </Message>
            </div>
        );
    }
}

export default InstallStep6Completed;