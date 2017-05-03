
app = angular.module('inv', ['ui.select2']);
app.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    }]);
app.controller('receipt', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.design = [{}];
        $scope.designx = {
            allowClear: true,
            ajax: {
                url: site_url + "sales/getDesignCodeA",
                dataType: 'json',
                quietMillis: 15,
                data: function (term, page) {
                    return {
                        term: term,
                        limit: 10
                    };
                },
                results: function (data, page) {
                    if (data.results != null) {
                        return {results: data.results};
                    } else {
                        return {results: [{id: '', text: 'No Match Found'}]};
                    }
                }
            }
        };
        $scope.prodcode = {
            allowClear: true,
            ajax: {
                url: site_url + "products/getAllProdCode",
                dataType: 'json',
                quietMillis: 15,
                data: function (term, page) {
                    return {
                        term: term,
                        limit: 10
                    };
                },
                results: function (data, page) {
                    if (data.results != null) {
                        return {results: data.results};
                    } else {
                        return {results: [{id: '', text: 'No Match Found'}]};
                    }
                }
            }
        };
        $scope.designstatus = {
            allowClear: true
        };
    }]);
app.controller('purchaseCode', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.pur = {};
        getDiscountme = function () {
            $scope.pur.supplier_id = $("#supplier_id").val();
            $scope.getDiscount();
        };
        $scope.getDiscount = function () {
            $scope.loading = 1;
            $http.get(site_url + "Purchases/getPurDiscount?v=1&" + $.param($scope.pur)).then(function (d) {
//                alert(JSON.stringify(d));
                $scope.pur.discount = d.data.discount+"%";
                $scope.loading = 0;
            });
        };
    }]);
app.controller('item_history', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.code = 0;
        $scope.history = [];
        $scope.loading = 0;
        $scope.getItemHistory = function () {
            $scope.loading = 1;
            $http.get(site_url + "reports/getItemHistoryReport/?v=1&code=" + $scope.code).success(function (data) {
                $scope.history = data;
                $scope.loading = 0;
            });
        };
    }]);
app.controller('addProducts', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {

        $scope.prod = {barcode: "", colorassorted: [], colorassoarr: [], colortype: "Single", sizeangle: "", sizetype: "Single", singlesize: "", multisizef: "", protype: "standard", qty: 1, colorqty: 0};
        $scope.loading = 0;
        $scope.setProdName = function (name) {
            $scope.prod.name = name;
        }
        $scope.getProdName = function () {
            $scope.loading = 1;
            Data.getProductName($.param($scope.prod)).then(function (d) {
//                alert(JSON.stringify(d));
                $scope.prod.name = d.data.name;
                $scope.loading = 0;
            });
        };
        $scope.getProdBarcode = function () {
            $scope.loading = 1;
            Data.getProductBarcode($.param($scope.prod)).then(function (d) {
//                alert(JSON.stringify(d));
                $scope.prod.barcode = d.data.name;
                $scope.loading = 0;
            });
        };
        $scope.getQty = function (id) {
            if ($scope.prod.qty !== $scope.prod.colorqty) {
                $(id).css({"border": "1px solid #f00"});
                $(id).siblings('p').removeClass('hide');
            } else {
                $(id).css({"border": "1px solid #CCCCCC"});
                $(id).siblings('p').addClass('hide');
            }
        }
        $scope.$watch(function (scope) {
            return scope.prod.colortype;
        }, function (newValue, oldValue) {
            if ($scope.prod.qty != 0) {
                if (newValue == "Single") {
                    $('.colorsingle').removeClass("hide");
                    $('.colorassorted').addClass("hide");
                    $scope.prod.colorassoarr = [];
                    $scope.prod.colorassorted = [];
                    $("#mulcolor").select2("val", "");
                    $scope.prod.colorqty = $scope.prod.qty;
                } else {
                    $('.colorsingle').addClass("hide");
                    $('.colorassorted').removeClass("hide");
                    $scope.prod.colorqty = 0;
                    if ($scope.prod.colorassorted.length != 0) {
                        var x = parseInt($scope.prod.qty) / parseInt($scope.prod.colorassorted.length);
                        $scope.prod.colorassoarr = [];
                        angular.forEach(newValue, function (v, k) {
                            $scope.prod.colorassoarr.push({qty: x});
                        });
                    }
                }
            } else {
                if (newValue != "" || oldValue != "") {
                    bootbox.alert('Please enter Qty first.');
                    $('.colorassorted').addClass("hide");
                }
            }
        });
        $scope.getQtyCal = function (id, qty) {
            var tot = 0;
            angular.forEach($scope.prod.colorassorted, function (v, k) {
                tot += parseInt($scope.prod.colorassoarr[k].qty);
            });
//            if (tot <= $scope.prod.qty) {
            var $qty = 0;
            var j = 0;
            angular.forEach($scope.prod.colorassorted, function (v, k) {
                if (j <= id) {
                    $qty += parseInt($scope.prod.colorassoarr[j].qty);
                }
                j++;
            });
            j--;
            var x = parseInt($scope.prod.qty - $qty) / parseInt((j - id));
            var i = 0;
            angular.forEach($scope.prod.colorassorted, function (v, k) {
                if (i > id) {
                    $scope.prod.colorassoarr[i] = {qty: x};
                }
                i++;
            });
//            } else {
//                bootbox.alert('Please ensure that the Product Qty and addion of assorted color qty should be same.');
//            }
        }
        $scope.$watch(function (scope) {
            return scope.prod.qty;
        }, function (newValue, oldValue) {
            if ($scope.prod.colortype == "Single") {
                $scope.prod.colorqty = newValue;
                $scope.prod.colorassorted = [];
            } else {
                if ($scope.prod.colorassorted.length != 0) {
                    var x = parseInt($scope.prod.qty) / parseInt($scope.prod.colorassorted.length);
                    $scope.prod.colorassoarr = [];
                    angular.forEach($scope.prod.colorassorted, function (v, k) {
                        $scope.prod.colorassoarr.push({qty: x});
                    });
                }
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.colorqty;
        }, function (newValue, oldValue) {
            if ($scope.prod.colortype == "Single") {
                $scope.prod.qty = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.colorassorted;
        }, function (newValue, oldValue) {
            var x = parseInt($scope.prod.qty) / parseInt(newValue.length);
            $scope.prod.colorassoarr = [];
            angular.forEach(newValue, function (v, k) {
                $scope.prod.colorassoarr.push({qty: x});
            });
        });
        $scope.$watch(function (scope) {
            return scope.prod.sizetype;
        }, function (newValue, oldValue) {
            if (newValue == "Single") {
                $scope.prod.multisizef = "";
                $scope.prod.multisizet = "";
                $("#multisizef").select2("val", "");
                $("#multisizet").select2("val", "");
            } else if (newValue == "Multiple") {
                $scope.prod.singlesize = "";
                $("#size").select2("val", "");
            }

        });
        $scope.getProductMargin = function () {
            Data.getProductMargin($.param($scope.prod)).then(function (d) {
                $scope.prod.margin = d.data.margin;
                var margin = 0;
//                if ($scope.prod.sizetype == "Single") {
                if ($scope.prod.margin != 0) {
                    margin = ($scope.prod.cost * $scope.prod.margin) / 100;
                    $scope.prod.price = parseFloat($scope.prod.cost) + parseFloat(margin);
                }
//                }
            });
        }
    }]);
app.controller('editProducts', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {

        $scope.prod = {};
        $scope.loading = 0;
        $scope.getProdName = function () {
            $scope.loading = 1;
            Data.getProductName($.param($scope.prod)).then(function (d) {
//                alert(JSON.stringify(d));
                $scope.prod.name = d.data.name;
                $scope.loading = 0;
            });
        };
        $scope.getProdBarcode = function () {
            $scope.loading = 1;
            Data.getProductBarcode($.param($scope.prod)).then(function (d) {
//                alert(JSON.stringify(d));
                $scope.prod.barcode = d.data.name;
                $scope.loading = 0;
            });
        };
        $scope.getQty = function (id) {
            if ($scope.prod.quantity !== $scope.prod.colorqty) {
                $(id).css({"border": "1px solid #f00"});
                $(id).siblings('p').removeClass('hide');
            } else {
                $(id).css({"border": "1px solid #CCCCCC"});
                $(id).siblings('p').addClass('hide');
            }
        }
        $scope.$watch(function (scope) {
            return scope.prod.colortype;
        }, function (newValue, oldValue) {
            if ($scope.prod.quantity != 0) {
                if (newValue == "Single") {
                    $('.colorsingle').removeClass("hide");
                    $('.colorassorted').addClass("hide");
                    $scope.prod.colorassoarr = [];
                    $scope.prod.colorassorted = [];
                    $("#mulcolor").select2("val", "");
                    $scope.prod.colorqty = $scope.prod.quantity;
                } else {
                    $('.colorsingle').addClass("hide");
                    $('.colorassorted').removeClass("hide");
//                    $scope.prod.colorqty = 0;
                    if ($scope.prod.colorassorted.length != 0) {
                        var x = parseInt($scope.prod.quantity) / parseInt($scope.prod.colorassorted.length);
                        $scope.prod.colorassoarr = [];
                        angular.forEach(newValue, function (v, k) {
                            $scope.prod.colorassoarr.push({quantity: x});
                        });
                    }
                }
            } else {
                if (newValue != "" || oldValue != "") {
//                    bootbox.alert('Please enter Qty first.');
                    $('.colorassorted').addClass("hide");
                }
            }
        });
        $scope.getQtyCal = function (id, qty) {
            var tot = 0;
            angular.forEach($scope.prod.colorassorted, function (v, k) {
                tot += parseInt($scope.prod.colorassoarr[k].qty);
            });
            if (tot <= $scope.prod.quantity) {
                var $qty = 0;
                var j = 0;
                angular.forEach($scope.prod.colorassorted, function (v, k) {
                    if (j <= id) {
                        $qty += parseInt($scope.prod.colorassoarr[j].qty);
                    }
                    j++;
                });
                j--;
                var x = parseInt($scope.prod.quantity - $qty) / parseInt((j - id));
                var i = 0;
                angular.forEach($scope.prod.colorassorted, function (v, k) {
                    if (i > id) {
                        $scope.prod.colorassoarr[i] = {quantity: x};
                    }
                    i++;
                });
            } else {
                bootbox.alert('Please ensure that the Product Qty and addion of assorted color qty should be same.');
            }
        }
        $scope.$watch(function (scope) {
            return scope.prod.qty;
        }, function (newValue, oldValue) {
            if ($scope.prod.colortype == "Single") {
                $scope.prod.colorqty = newValue;
                $scope.prod.colorassorted = [];
            } else {
                if ($scope.prod.colorassorted.length != 0) {
                    var x = parseInt($scope.prod.quantity) / parseInt($scope.prod.colorassorted.length);
                    $scope.prod.colorassoarr = [];
                    angular.forEach($scope.prod.colorassorted, function (v, k) {
                        $scope.prod.colorassoarr.push({quantity: x});
                    });
                }
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.colorqty;
        }, function (newValue, oldValue) {
            if ($scope.prod.colortype == "Single") {
                $scope.prod.quantity = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.colorassorted;
        }, function (newValue, oldValue) {
            var x = parseInt($scope.prod.quantity) / parseInt(newValue.length);
            $scope.prod.colorassoarr = [];
            angular.forEach(newValue, function (v, k) {
                $scope.prod.colorassoarr.push({quantity: x});
            });
        });
        $scope.getProductMargin = function () {
            Data.getProductMargin($.param($scope.prod)).then(function (d) {
                $scope.prod.margin = d.data.margin;
                var margin = 0;
                if ($scope.prod.sizetype == "Single") {
                    if ($scope.prod.margin != 0) {
                        margin = ($scope.prod.cost * $scope.prod.margin) / 100;
                        $scope.prod.price = parseFloat($scope.prod.cost) + parseFloat(margin);
                    }
                } else {
                    if ($scope.prod.margin != 0) {
                        margin = ($scope.prod.cost * $scope.prod.margin) / 100;
                        $scope.prod.price = parseFloat($scope.prod.cost) + parseFloat(margin);
                    }
                }
            });
        };
        $scope.$watch(function (scope) {
            return scope.prod.department;
        }, function (newValue, oldValue) {
            $scope.prod.dept = newValue;
            if (newValue != oldValue) {
                $scope.prod.dept = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.type_id;
        }, function (newValue, oldValue) {
            $scope.prod.type = newValue;
            if (newValue != oldValue) {
                $scope.prod.type = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.section;
        }, function (newValue, oldValue) {
            $scope.prod.section_id = newValue;
            if (newValue != oldValue) {
                $scope.prod.section_id = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.product_items;
        }, function (newValue, oldValue) {
            $scope.prod.product_item = newValue;
            if (newValue != oldValue) {
                $scope.prod.product_item = newValue;
            }
        });
        $scope.$watch(function (scope) {
            return scope.prod.brands;
        }, function (newValue, oldValue) {
            $scope.prod.brands_id = newValue;
            if (newValue != oldValue) {
                $scope.prod.brands_id = newValue;
            }
        });
    }]);