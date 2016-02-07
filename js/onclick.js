 function changeit(){
  var x = document.getElementById("changingtype");
  if(x.checked){
    state = 'checkbox';
    document.getElementById("radiotocheck-first").required=false;
  } else {
    state = 'radio';
    document.getElementById("radiotocheck-first").required=true;
  }
  var radios = document.getElementsByName('motif[]');
    for (i = 0; i < radios.length; i++) {
        radios[i].type = state;
    }
 }
 function datechange(){
  var value1 = document.getElementById('date').value;
                $.post('checkdate.php',{ date:value1 },function(data){
                $('#fordatecheck').html(data);
                });
 }
 function choice4color(){
        document.getElementById("radiotocheck-first").required=true;
                        (function(){
                                var myDiv = document.getElementById("load1");
                                var show = function(){
                                myDiv.setAttribute("class", "form-group");
                                document.getElementById("themeparty").setAttribute("class", "hide");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("motif").setAttribute("class", "form-group");
                                }
                                show();
                        })();
 }
 function choice4theme(){
        document.getElementById("radiotocheck-first").required=false;
                        (function(){
                                var myDiv = document.getElementById("load1");
                                var show = function(){
                                myDiv.setAttribute("class", "form-group");
                                document.getElementById("motif").setAttribute("class", "hide");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("themeparty").setAttribute("class", "form-group");
                                }
                                show();
                        })();
 }
 function uploadpic(){
                      (function(){
                                var myDiv = document.getElementById("load2");
                                var show = function(){
                                document.getElementById("suggestedtheme").setAttribute("class","hide");
                                myDiv.setAttribute("class", "form-group");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("blah").setAttribute("src","#");
                                document.getElementById("uploadedpic").setAttribute("class","form-group");
                                document.getElementById("imgInp").disabled = false;
                                }
                                show();
                        })();
 }
 function uploadpic1(){
                      (function(){
                                var myDiv = document.getElementById("load2");
                                var show = function(){
                                document.getElementById("uploadedpic").setAttribute("class","hide");
                                document.getElementById("blah").setAttribute("class","hide");
                                myDiv.setAttribute("class", "form-group");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("imgInp").value = "";
                                document.getElementById("blah").setAttribute("src","#");
                                document.getElementById("suggestedtheme").setAttribute("class","form-group");
                                document.getElementById("imgInp").disabled = false;
                                }
                                show();
                        })();
 }
 function loadscreen(){
      var wholebody = document.getElementById("login1");
      var loading = document.getElementById("login");
      var show = function(){
      setTimeout(hide, 2000);  // 5 seconds
      }
      var hide = function(){
      loading.setAttribute("class", "hide");
      wholebody.setAttribute("class", "show");
      }
      show();
 }
        function removeall(){
                        (function(){
                                var myDiv = document.getElementById("load4");
                                var show = function(){
                                myDiv.setAttribute("class", "form-group");
                                document.getElementById("fortitle").setAttribute("class","hide");
                                document.getElementById("blah").setAttribute("class","hide");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("filetype").setAttribute("class","btn btn-success col-md-12");
                                document.getElementById("notlisted").setAttribute("class","#");
                                }
                                show();
                        })();
        };
        function removeall1(){
                        (function(){
                                var myDiv = document.getElementById("load3");
                                var show = function(){
                                myDiv.setAttribute("class", "form-group");
                                document.getElementById("blah1").setAttribute("class","hide");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("inpRem").setAttribute("class","hide");
                                document.getElementById("imgInp").value = "";
                                document.getElementById("clicksuggest").setAttribute("class","col-md-12");
                                }
                                show();
                        })();
        };
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
        readURL(this);
               (function(){
                  var myDiv = document.getElementById("load3");
                  var show = function(){
                    document.getElementById("blah").setAttribute("class","hide");
                  myDiv.setAttribute("class", "form-group");
                  setTimeout(hide, 800);  // 5 seconds
                  }
                  var hide = function(){
                   myDiv.setAttribute("class", "hide");
                   document.getElementById("blah1").setAttribute("class","uploadedpic");
                   document.getElementById("inpRem").setAttribute("class","btn btn-sm btn-default");
                   document.getElementById("clicksuggest").setAttribute("class","hide");
                   }
                   show();
               })();
      });
        function eventlist(){
            var x = document.getElementById("event_list").value;
            var change = function(){
              document.getElementById("event_list").setAttribute("onchange", "eventlist1()");
            }
                        if(x == "Birthday"){
                            (function(){
                                  var myDiv = document.getElementById("load");
                                  var show = function(){
                                    document.getElementById("motif").setAttribute("class", "hide");
                                    document.getElementById("radiotocheck-first").required=false;
                                    document.getElementById("choicetocheck").required=true;
                                    myDiv.setAttribute("class", "form-group");
                                    setTimeout(hide, 500);  // 5 seconds
                                  }
                                  var hide = function(){
                                  myDiv.setAttribute("class", "form-group hide");
                                  document.getElementById("choices").setAttribute("class", "form-group");
                                  change();
                                  }

                                  show();
                                })();
                        }else{
                            (function(){
                                var myDiv = document.getElementById("load");
                                var show = function(){
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                document.getElementById("choicetocheck").required=false;
                                document.getElementById("radiotocheck-first").required=true;
                                document.getElementById("choices").setAttribute("class", "hide");
                                document.getElementById("motif").setAttribute("class", "form-group");
                                }
                                show();
                                })();
                        }
        }
        function eventlist1(){
          document.getElementById("radiotocheck-first").required=true;
          document.getElementById("choicetocheck").required=false;
          document.getElementById("event_list").setAttribute("onchange", "eventlist()");
                      (function(){
                                var myDiv = document.getElementById("load");
                                var show = function(){
                                document.getElementById("choices").setAttribute("class", "hide");
                                myDiv.setAttribute("class", "form-group");
                                setTimeout(hide, 500);  // 5 seconds
                                }
                                var hide = function(){
                                myDiv.setAttribute("class", "hide");
                                document.getElementById("motif").setAttribute("class", "form-group");
                                }
                                show();
                        })();
        }
        function partylist(){
            var x = document.getElementById("type_party").value;
                   (function(){
                      var myDiv = document.getElementById("load1");

                      var show = function(){
                        myDiv.setAttribute("class", "form-group");
                        document.getElementById("themeparty").setAttribute("class", "form-group hide");
                        setTimeout(hide, 600);  // 5 seconds
                      }
                       var hide = function(){
                      myDiv.setAttribute("class", "form-group hide");
                      }
                      show();
                })();
            if(x == "Kid's Party"){
                (function(){
                      var myDiv = document.getElementById("load1");

                      var show = function(){
                        myDiv.setAttribute("class", "form-group");
                        setTimeout(hide, 600);  // 5 seconds
                      }

                      var hide = function(){
                      myDiv.setAttribute("class", "form-group hide");
                      document.getElementById("themeparty").setAttribute("class", "form-group");
                      document.getElementById("themeparty").disabled = false;
                      document.getElementById("suggested").setAttribute("class", "btn btn-info col-lg-12 hide");
                      document.getElementById("suggested1").setAttribute("class", "btn btn-info col-lg-12");
                      }

                      show();
                    })();
            }
            if(x == "Adult's Party"){
                (function(){
                      var myDiv = document.getElementById("load1");

                      var show = function(){
                        myDiv.setAttribute("class", "form-group");
                        setTimeout(hide, 600);  // 5 seconds
                      }

                      var hide = function(){
                      myDiv.setAttribute("class", "form-group hide");
                      document.getElementById("themeparty").setAttribute("class", "form-group");
                      document.getElementById("themeparty").disabled = false;
                      document.getElementById("suggested1").setAttribute("class", "btn btn-info col-lg-12 hide");
                      document.getElementById("suggested").setAttribute("class", "btn btn-info col-lg-12");
                      }

                      show();
                    })();
            }else{
                document.getElementById("themeparty").disabled = true;
                document.getElementById("themeparty").setAttribute("class", "form-group hide");
            }
        }
        function anniv_list(){
            var x = document.getElementById("selanniv").value;
                   (function(){
                      var myDiv = document.getElementById("load2");

                      var show = function(){
                        myDiv.setAttribute("class", "form-group");
                        document.getElementById("themeparty").setAttribute("class", "form-group hide");
                        setTimeout(hide, 600);  // 5 seconds
                      }
                       var hide = function(){
                      myDiv.setAttribute("class", "form-group hide");
                      document.getElementById("motif").setAttribute("class", "form-group");
                      }
                      show();
                })();
        }
        function navigation(){
            var x = document.getElementById("myonoffswitch");

            if(x.checked){
              (function(){
                var myDiv = document.getElementById("loadforguest");
                var show = function(){
                  myDiv.setAttribute("class","form-group");
                  setTimeout(hide,600);
                }
                var hide = function(){
                  myDiv.setAttribute("class","hide");
                  document.getElementById("guest").setAttribute("class", "form-group");
                }
                show();
              })();
                document.getElementById("guestid").disabled = false;
                document.getElementById("navigation_hide").setAttribute("class", "hide");
                document.getElementById("navigation_show").setAttribute("class", "");
            }else{
              (function(){
                var myDiv = document.getElementById("loadforguest");
                var show = function(){
                  myDiv.setAttribute("class","form-group");
                  document.getElementById("guest").setAttribute("class", "hide");
                  setTimeout(hide,600);
                }
                var hide = function(){
                  myDiv.setAttribute("class","hide");
                }
                show();
              })();
                document.getElementById("guestid").disabled = true;
                document.getElementById("navigation_hide").setAttribute("class", "");
                document.getElementById("navigation_show").setAttribute("class", "hide");
            }
        }

    $(document).ready(function () {
  
    $('#toggle-view li').click(function () {

      var text = $(this).children('div.panel');

      if (text.is(':hidden')) {
        text.slideDown('200');
        $(this).children('span').html('Click to hide details  -');   
      } else {
        text.slideUp('200');
        $(this).children('span').html('Click to view details  +');   
      }
      
    });
});
    $('#clickbudget').click(function(){
            $('#forbudget2').attr("class","col-lg-3");
            $('#enterbudget').keyup(function(){
                var valuebudget = $(this).val();
                $('#forbudget1').attr("class","hide");
                  $.post('budget.php',{ budget:valuebudget },function(data){
                    $('#budget').html(data);
                  });
              });
            
        });
    