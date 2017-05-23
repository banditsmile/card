// JScript 文件
function ShowKeFu()

                        {

                            var obj = document.getElementById("KF");

                            var pos = getElementPos("KF");

                            var detail = document.getElementById("public_top_menu_ctn");

                            detail.style.display = "block";

                            detail.style.left = pos.x + obj.offsetWidth - detail.offsetWidth - 2 + "px";

                            detail.style.top = pos.y + obj.offsetHeight - 8  + "px";

                        }

                        function HideKeFu()

                        {

                            var detail = document.getElementById("public_top_menu_ctn");

                            detail.style.display = "none";

                        }

                        

                        function ShowMenu()

                        {

                            var obj = document.getElementById("mainmenu2");

                            var pos = getElementPos("mainmenu2");

                            var detail = document.getElementById("mainmenu1");

                            detail.style.display = "block";

                            detail.style.left = pos.x + 58 + "px";

                            detail.style.top = pos.y + obj.offsetHeight - 15  + "px";

                        }

                        function HideMenu()

                        {

                            var detail = document.getElementById("mainmenu1");

                            detail.style.display = "none";

                        }