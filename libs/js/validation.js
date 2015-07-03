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
                        message: 'Required and cannot be empty'
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
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });

    $('#changePasswordForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            new_password: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    identical: {
                        field: 'old_password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            new_password: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
                    identical: {
                        field: 'new_password',
                        message: 'The password and its confirm are not the same'
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
                        message: 'Required and cannot be empty'
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

    $('#post_form').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            },
            body: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            },
            category_id: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
    
    $('#event_form').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            },
            body: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            },
            event_time: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    },
		            date: {
		                message: 'The date is not valid',
		                format: 'YYYY-MM-DD',
		                // min and max options can be strings or Date objects
		                min: '2015-07-03'
		                //max: '2015-07-03'
		            }
                }
            },
            cover_img_url: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
    
    $('#form_add_chatroom').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	chat_title: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            },
            participants:{
            	validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
    
    $('#categoryForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	name: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
    
    $('#teamForm').bootstrapValidator({
        err: {
            container: 'tooltip'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	name: {
                validators: {
                    notEmpty: {
                        message: 'Required and cannot be empty'
                    }
                }
            }
        }
    });
});