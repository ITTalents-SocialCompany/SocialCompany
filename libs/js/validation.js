$(document).ready(function() {
    $('#registerForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z][-a-zA-Z0-9]+$/i,
                        message: 'The username can consist of alphabetical characters and digist!'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'The password must be more than 4 and less than 30 characters long'
                    }
                }
            },
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z][-a-zA-Z ]+$/i,
                        message: 'The first name can consist of alphabetical characters and spaces only'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z][-a-zA-Z ]+$/i,
                        message: 'The last name can consist of alphabetical characters and spaces only'
                    }
                }
            }
        }
    });

    $('#loginForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[A-Za-z][-a-zA-Z0-9]+$/i,
                        message: 'The username can consist of alphabetical characters and spaces only'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    }
                }
            }
        }
    });

    $('#profileEditForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            age: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    digits: {
                        message: 'The age must be a number'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    digits: {
                        message: 'The phone must be a number'
                    }
                }
            },
            gender_id: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
});