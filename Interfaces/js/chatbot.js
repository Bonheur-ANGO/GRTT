var botui = new BotUI('my-botui-app');

botui.message.add({
    delay: 1000,
    loading: true,
    content: 'Bonjour, je m\'appelle Marie'
}).then(function() {
    return botui.message.add({
        delay: 1000,
        loading: true,
        content: 'Je suis le robot créé par Bonheur ANGO pour répondre aux questions concernant les réclamations de Tunisie Télécom'
    });
}).then(function() {
    return botui.message.add({
        delay: 1000,
        loading: true,
        content: 'Puis-je connaître votre prénom?'
    })
}).then(function() {
    return botui.action.text({
        action: {
            placeholder: 'Votre prénom'
        }
    });
}).then(function(res) {
    return botui.message.add({
        delay: 1000,
        loading: true,
        content: res.value + ' est un très beau prénom'
    });
}).then(function() {
    return botui.message.add({
        delay: 1000,
        loading: true,
        content: 'Dans quelle domaine puis-je vous aider?'
    });
}).then(function() {
    return botui.action.button({
        action: [{
                delay: 1000,
                loading: true,
                text: 'Téléphonie Fixe',
                value: '1'
            },
            {
                text: 'Téléphonie Mobile',
                value: '2'
            },
            {
                text: 'Internet, ADSL, 3G',
                value: '3'
            },
            {
                text: 'Internet, ADSL, 3G',
                value: '4'
            },
            {
                text: 'Application',
                value: '5'
            },
            {
                text: 'Réclamations',
                value: '6'
            }

        ]
    });
}).then(function(res) {
    if (res.value === '1') {
        botui.action.button({
            action: [{
                    delay: 1000,
                    loading: true,
                    text: 'En quoi consiste le service MSAKNI World',
                    value: 'q1'
                },
                {
                    text: 'Comment puis je arrêter la réception des sms',
                    value: 'q2'
                },
                {
                    text: 'InMOIUEVMOV',
                    value: 'q3'
                },
                {
                    text: 'IUHRTPIM',
                    value: 'q4'
                }

            ]
        });
    } else if (res.value === '5') {
        botui.message.add({
            delay: 1000,
            loading: true,
            content: 'Cette application a été créée dans le but de pouvoir assister les clients de Tunisie Télécom par rapport à toutes leurs préoccupations concernant'
        });
    }
})