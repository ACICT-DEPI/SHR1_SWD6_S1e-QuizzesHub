( function ( $ ) {
    "use strict";


        var ctx = document.getElementById( "universitiesChart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: "Number of Users",
                        data: [],
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)"
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    } ]
                }
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            url: '/admin/charts/most-universities',
            method: 'GET',
            success: function(response) {

                let universityNames = [];
                let userCounts = [];

                response.forEach(function(university) {
                    universityNames.push(university.name);
                    userCounts.push(university.user_count);
                });

                // Update chart data
                myChart.data.labels = universityNames;
                myChart.data.datasets[0].data = userCounts;
                myChart.update();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching university data:', error);
            }
        });


} )( jQuery );

( function ( $ ) {
    "use strict";


    var ctx = document.getElementById( "topUsersBarChart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    label: "User Scores",
                    data: [],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                } ]
            }
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // Fetch data from the server via AJAX
    $.ajax({
        url: '/admin/top-users-data',
        method: 'GET',
        success: function(response) {
            // Extract user names and scores
            let userNames = [];
            let userScores = [];

            response.forEach(function(user) {
                userNames.push(user.fname + ' ' + user.lname); // Full name of the user
                userScores.push(user.score);
            });

            // Update chart data
            myChart.data.labels = userNames;
            myChart.data.datasets[0].data = userScores;
            myChart.update(); // Refresh the chart to display the new data
        },
        error: function(xhr, status, error) {
            console.error('Error fetching top user data:', error);
        }
    });

} )( jQuery );


( function ( $ ) {
    "use strict";

    // Initialize the chart with empty data
    var ctx = document.getElementById( "popularCoursesBarChart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [], // Will be populated with course names
            datasets: [
                {
                    label: "Number of Users",
                    data: [], // Will be populated with user counts
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                } ]
            }
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // Fetch data from the server via AJAX
    $.ajax({
        url: '/admin/popular-courses-data',
        method: 'GET',
        success: function(response) {
            // Extract course names and user counts
            let courseNames = [];
            let userCounts = [];

            response.forEach(function(course) {
                courseNames.push(course.code); // Course name
                userCounts.push(course.user_count); // Number of users who took exams for this course
            });

            // Update chart data
            myChart.data.labels = courseNames;
            myChart.data.datasets[0].data = userCounts;
            myChart.update(); // Refresh the chart to display the new data
        },
        error: function(xhr, status, error) {
            console.error('Error fetching popular course data:', error);
        }
    });

} )( jQuery );
