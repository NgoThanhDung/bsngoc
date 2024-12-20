(function ($) {

    'use strict';
	
    // ------------------------------------------------------- //
    // Line Chart 01
    // ------------------------------------------------------ //	
    var ctx = document.getElementById('line-chart-01').getContext("2d");

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sep", "Oct", "Nov", "Dec", "Jan"],
            datasets: [{
                label: "Sales",
                borderColor: "#08a6c3",
                pointBackgroundColor: "#08a6c3",
                pointHoverBorderColor: "#08a6c3",
                pointHoverBackgroundColor: "#08a6c3",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "transparent",
                borderWidth: 3,
                data: [10, 60, 20, 40, 45]
            }]
        },
        options: {
			legend: {
				display: false
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: true,
                        beginAtZero: true
                    },
                    gridLines: {
                        drawBorder: true,
                        display: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: true,
                        display: true
                    },
                    ticks: {
                        display: true
                    }
                }]
            }
        }
    });

    // ------------------------------------------------------- //
    // Line Chart 02
    // ------------------------------------------------------ //	
    var ctx = document.getElementById('line-chart-02').getContext("2d");

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sep", "Oct", "Nov", "Dec", "Jan"],
            datasets: [{
                label: "Sales",
                borderColor: "#f9cf1b",
                pointBackgroundColor: "#f9cf1b",
                pointHoverBorderColor: "#f9cf1b",
                pointHoverBackgroundColor: "#f9cf1b",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "transparent",
                borderWidth: 3,
                data: [10, 60, 20, 40, 45]
            },
            {
                label: "Visitors",
                borderColor: "#5d5386",
                pointBackgroundColor: "#5d5386",
                pointHoverBorderColor: "#342868",
                pointHoverBackgroundColor: "#342868",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "transparent",
                borderWidth: 3,
                data: [20, 50, 10, 35, 30]
            }]
        },
        options: {
			legend: {
				display: false
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: true,
                        beginAtZero: true
                    },
                    gridLines: {
                        drawBorder: true,
                        display: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: true,
                        display: true
                    },
                    ticks: {
                        display: true
                    }
                }]
            }
        }
    });
	
    // ------------------------------------------------------- //
    // Area Chart 01
    // ------------------------------------------------------ //	
    var ctx = document.getElementById('area-chart-01').getContext("2d");

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sep", "Oct", "Nov", "Dec", "Jan"],
            datasets: [{
                label: "Sales",
                borderColor: "#08a6c3",
                pointBackgroundColor: "#08a6c3",
                pointHoverBorderColor: "#08a6c3",
                pointHoverBackgroundColor: "#08a6c3",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "#08a6c3",
                borderWidth: 3,
                data: [10, 60, 20, 40, 45]
            }]
        },
        options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: true,
                        beginAtZero: true
                    },
                    gridLines: {
                        drawBorder: true,
                        display: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: true,
                        display: true
                    },
                    ticks: {
                        display: true
                    }
                }]
            }
        }
    });
	
    // ------------------------------------------------------- //
    // Area Chart 02
    // ------------------------------------------------------ //	
    var ctx = document.getElementById('area-chart-02').getContext("2d");

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sep", "Oct", "Nov", "Dec", "Jan"],
            datasets: [{
                label: "Sales",
                borderColor: "#f9cf1b",
                pointBackgroundColor: "#f9cf1b",
                pointHoverBorderColor: "#f9cf1b",
                pointHoverBackgroundColor: "#f9cf1b",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "rgba(231, 108, 144, 0.6)",
                borderWidth: 3,
                data: [20, 50, 10, 35, 30]
            },
            {
                label: "Visitors",
                borderColor: "#5d5386",
                pointBackgroundColor: "#5d5386",
                pointHoverBorderColor: "#5d5386",
                pointHoverBackgroundColor: "#5d5386",
                pointBorderColor: "#fff",
                pointBorderWidth: 3,
                pointRadius: 6,
                fill: true,
                backgroundColor: "rgba(93, 83, 134, 0.6)",
                borderWidth: 3,
                data: [10, 60, 20, 40, 45]
            }]
        },
        options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: true,
                        beginAtZero: true
                    },
                    gridLines: {
                        drawBorder: true,
                        display: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: true,
                        display: true
                    },
                    ticks: {
                        display: true
                    }
                }]
            }
        }
    });
	
    // ------------------------------------------------------- //
    // Vertical Bar 01
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("vertical-chart-01").getContext('2d');
	
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb"],
			datasets: [{
				label: "Incomes",
                borderColor: "#fff",
				backgroundColor: "rgba(93, 83, 134, 0.85)",
				hoverBackgroundColor: "#5d5386",
				data: [150, 120, 130, 100, 80, 50]
			}]
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
			scales: {
				xAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}],
				yAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}]
			}	
		}
	});

    // ------------------------------------------------------- //
    // Vertical Bar 02
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("vertical-chart-02").getContext('2d');
	
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb"],
			datasets: [{
				label: 'Incomes',
				data: [150, 120, 130, 100, 80, 50],
                borderColor: "#fff",
				backgroundColor: "rgba(93, 83, 134, 0.85)",
				hoverBackgroundColor: "#5d5386"
			}, {
				label: 'Expenses',
				data: [120, 150, 80, 140, 45, 80],
				borderColor: "#fff",
				backgroundColor: "#e4e8f0",
				hoverBackgroundColor: "#dde1e9"
			}]	
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
			scales: {
				xAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}],
				yAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}]
			}	
		}
	});
	
    // ------------------------------------------------------- //
    // Horizontal Bar 01
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("horizontal-chart-01").getContext('2d');
	
	var myChart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb"],
			datasets: [{
				label: "Incomes",
                borderColor: "#fff",
				backgroundColor: "rgba(93, 83, 134, 0.85)",
				hoverBackgroundColor: "#5d5386",
				data: [150, 120, 130, 100, 80, 50]
			}]
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
			scales: {
				xAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}],
				yAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}]
			}	
		}
	});
	
    // ------------------------------------------------------- //
    // Horizontal Bar 02
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("horizontal-chart-02").getContext('2d');
	
	var myChart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb"],
			datasets: [{
				label: 'Incomes',
				data: [150, 120, 130, 100, 80, 50],
                borderColor: "#fff",
				backgroundColor: "rgba(93, 83, 134, 0.85)",
				hoverBackgroundColor: "#5d5386"
			}, {
				label: 'Expenses',
				data: [120, 150, 80, 140, 45, 80],
				borderColor: "#fff",
				backgroundColor: "#e4e8f0",
				hoverBackgroundColor: "#dde1e9"
			}]	
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: false,
                yPadding: 10
            },
			scales: {
				xAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}],
				yAxes: [{
					stacked: false,
					gridLines: {
						drawBorder: true,
						display: true
					},
					ticks: {
						display: true
					}
				}]
			}	
		}
	});	
	
    // ------------------------------------------------------- //
    // Doughnut Chart
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("doughnut-chart").getContext('2d');

	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Blue", "Green", "Red"],
			datasets: [{
				label: "Label",
				backgroundColor: ["#08a6c3", "#5cb85c", "#d9534f"],
				hoverBorderColor: ["#fff", "#fff", "#fff"],
				borderColor: ["#fff", "#fff", "#fff"],
				borderWidth: 10,
				data: [2478, 4268, 1265]
			}]
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: true,
                yPadding: 10
            }
		}
	});

    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("pie-chart").getContext('2d');

	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Blue", "Green", "Red"],
			datasets: [{
				label: "Label",
				backgroundColor: ["#08a6c3", "#5cb85c", "#d9534f"],
				borderColor: ["#fff", "#fff", "#fff"],
				hoverBorderColor: ["#fff", "#fff", "#fff"],
				borderWidth: 10,
				data: [2478, 4268, 1265]
			}]
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: true,
                yPadding: 10
            }
		}
	});
	
    // ------------------------------------------------------- //
    // Radar Chart
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("radar-chart").getContext('2d');

	var myChart = new Chart(ctx, {
		type: 'radar',
		data: {
		    labels: ["January", "Febuary", "March", "April", "May"],
		    datasets: [
			{
			    label: "1950",
			    fill: true,
			    backgroundColor: "rgba(93, 83, 134, 0.2)",
			    borderColor: "rgba(93, 83, 134, 0.8)",
			    pointBorderColor: "#fff",
			    pointBackgroundColor: "rgba(93, 83, 134, 1)",
			    data: [40, 55, 60, 10, 70]
			}, 
			{
			    label: "2050",
			    fill: true,
			    backgroundColor: "rgba(231, 108, 144, 0.2)",
			    borderColor: "rgba(231, 108, 144, 0.8)",
			    pointBorderColor: "#fff",
			    pointBackgroundColor: "rgba(231, 108, 144, 1)",
			    pointBorderColor: "#fff",
			    data: [60, 70, 35, 20, 80]
			}
		]},
		options: {
			legend: {
				display: false
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: true,
                yPadding: 10
            }
		}
	});

    // ------------------------------------------------------- //
    // Polar Chart
    // ------------------------------------------------------ //	
	var ctx = document.getElementById("polar-chart").getContext('2d');

	var myChart = new Chart(ctx, {
		type: 'polarArea',
		data: {
			labels: ["Blue", "Green", "Red", "Violet"],
			datasets: [{
				label: "Label",
				backgroundColor: ["#08a6c3", "#5cb85c", "#d9534f", "#5d5386"],
				borderColor: ["#fff", "#fff", "#fff", "#fff"],
				hoverBorderColor: ["#fff", "#fff", "#fff", "#fff"],
				borderWidth: 5,
				data: [2478, 4268, 1265, 3000]
			}]
		},
		options: {
			legend: {
				display: true,
				position: 'top',
				labels: {
					fontColor: "#2e3451",
					usePointStyle: true,
					fontSize: 13
				}
			},
            tooltips: {
                backgroundColor: 'rgba(47, 49, 66, 0.8)',
                titleFontSize: 13,
                titleFontColor: '#fff',
                caretSize: 0,
                cornerRadius: 4,
                xPadding: 10,
                displayColors: true,
                yPadding: 10
            }
		}
	});
	
})(jQuery);