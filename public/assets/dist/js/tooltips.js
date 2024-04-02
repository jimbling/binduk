
    <?php foreach ($siswa as $ssw) : ?>
        const button<?= $ssw['id']; ?> = document.querySelector('#button-<?= $ssw['id']; ?>');
        const tooltip<?= $ssw['id']; ?> = document.querySelector('#tooltip');

        const popperInstance<?= $ssw['id']; ?> = Popper.createPopper(button<?= $ssw['id']; ?>, tooltip<?= $ssw['id']; ?>, {
            modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            }],
        });

        function show<?= $ssw['id']; ?>() {
            // Make the tooltip visible
            tooltip<?= $ssw['id']; ?>.setAttribute('data-show', '');

            // Enable the event listeners
            popperInstance<?= $ssw['id']; ?>.setOptions((options) => ({
                ...options,
                modifiers: [
                    ...options.modifiers,
                    {
                        name: 'eventListeners',
                        enabled: true
                    },
                ],
            }));

            // Update its position
            popperInstance<?= $ssw['id']; ?>.update();
        }

        function hide<?= $ssw['id']; ?>() {
            // Hide the tooltip
            tooltip<?= $ssw['id']; ?>.removeAttribute('data-show');

            // Disable the event listeners
            popperInstance<?= $ssw['id']; ?>.setOptions((options) => ({
                ...options,
                modifiers: [
                    ...options.modifiers,
                    {
                        name: 'eventListeners',
                        enabled: false
                    },
                ],
            }));
        }

        const showEvents<?= $ssw['id']; ?> = ['mouseenter', 'focus'];
        const hideEvents<?= $ssw['id']; ?> = ['mouseleave', 'blur'];

        showEvents<?= $ssw['id']; ?>.forEach((event) => {
            button<?= $ssw['id']; ?>.addEventListener(event, show<?= $ssw['id']; ?>);
        });

        hideEvents<?= $ssw['id']; ?>.forEach((event) => {
            button<?= $ssw['id']; ?>.addEventListener(event, hide<?= $ssw['id']; ?>);
        });
    <?php endforeach; ?>

