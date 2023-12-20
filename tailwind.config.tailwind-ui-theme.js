export default {
    theme: {
        extend: {
            colors: {
                tut: {
                    primary: {
                        DEFAULT: '#4F46E5', // Theme color
                            text: '#ffffff', // Text color that goes onto primary color
                    },
                    secondary: {
                        DEFAULT: '#4338CA', // Conversion color
                            text: '#111827', // Text color that goes onto secondary color
                    },
                    neutral: 'rgb(var(--neutral) / <alpha-value>)', // Default text color
                        inactive: 'rgb(var(--inactive) / <alpha-value>)', // Inactive text color
                    highlight: 'rgb(var(--highlight) / <alpha-value>)', // Background highlight color
                    border: 'rgb(var(--border) / <alpha-value>)', // Border color
                },
            },
            borderColor: {
                DEFAULT: 'rgb(var(--border) / <alpha-value>)', // Border color default so it gets used when only using border
            },
        },
    },
}
