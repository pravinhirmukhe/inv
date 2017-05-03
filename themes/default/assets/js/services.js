/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.directive('select2', function ($rootScope) {
    return {
        restrict: "A",
        link: function (scope, el, attr, ngModel) {
            $(el).select2({minimumResultsForSearch: 6});
        }
    };
});
app.directive('defaultAttrib', function ($rootScope) {
    return {
        restrict: "A",
        link: function (scope, el, attr, ngModel) {
            $(el).select2({
                minimumInputLength: 1,
                data: [],
                initSelection: function (element, callback) {
                    $.ajax({
                        type: "get", async: false,
                        url: site_url + "products/getIdAttribute",
                        data: {
                            term: $(element).val(),
                            tab: $(element).data('tab'),
                            id: $("#" + $(element).data('id')).val(),
                            key: $(element).data('key'),
                        },
                        dataType: "json",
                        success: function (data) {
                            callback(data[0]);
                        }
                    });
                },
                ajax: {
                    url: site_url + "products/getIdAttributes",
                    dataType: 'json',
                    quietMillis: 15,
                    data: function (term, page) {
                        return {
                            term: term,
                            tab: $(el).data('tab'),
                            id: $("#" + $(el).data('id')).val(),
                            key: $(el).data('key'),
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
            });
        }
    };
});
app.directive('supplier', function ($rootScope) {
    return {
        restrict: "A",
        link: function (scope, el, attr, ngModel) {
            $(el).select2({
                minimumInputLength: 1,
                data: [],
                initSelection: function (element, callback) {
                    $.ajax({
                        type: "get", async: false,
                        url: site_url + "suppliers/suggestions",
                        data: {
                            term: $(element).val(),
                            limit: 10
                        },
                        dataType: "json",
                        success: function (data) {
                            callback(data[0]);
                        }
                    });
                },
                ajax: {
                    url: site_url + "suppliers/suggestions",
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
            });
        }
    };
});
app.directive('sizesel', function ($rootScope) {
    return {
        restrict: "A",
        link: function (scope, el, attr, ngModel) {
            function getids() {
                var $ids = $(el).data('id').split(",");
                var $idvals = "";
                $.each($ids, function (k, v) {
                    $idvals += ($("#" + v).val() ? $("#" + v).val() : "") + "-";
                });
                $idvals = $idvals.trim();
                return $idvals;
            }
            $(el).select2({
                minimumInputLength: 1,
                data: [],
                initSelection: function (element, callback) {
                    $.ajax({
                        type: "get", async: false,
                        url: site_url + "products/getIdAttribute",
                        data: {
                            term: $(element).val(),
                            tab: $(element).data('tab'),
                            id: getids(),
                            key: $(element).data('key'),
                        },
                        dataType: "json",
                        success: function (data) {
                            callback(data[0]);
                        }
                    });
                },
                ajax: {
                    url: site_url + "products/getIdAttributes",
                    dataType: 'json',
                    quietMillis: 15,
                    data: function (term, page) {
                        return {
                            term: term,
                            tab: $(el).data('tab'),
                            id: getids(),
                            key: $(el).data('key'),
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
            });
        }
    };
});
app.directive('icheck', ['$timeout', '$parse', function ($timeout, $parse) {
        return {
            restrict: 'A',
            require: '?ngModel',
            link: function (scope, element, attr, ngModel) {
                $timeout(function () {
                    var value = attr.value;
                    function update(checked) {
                        if (attr.type === 'radio') {
                            ngModel.$setViewValue(value);
                        } else {
                            ngModel.$setViewValue(checked);
                        }
                    }
                    $(element).iCheck({
                        checkboxClass: attr.checkboxClass || 'icheckbox_square-blue',
                        radioClass: attr.radioClass || 'iradio_square-blue'
                    }).on('ifChanged', function (e) {
                        scope.$apply(function () {
                            update(e.target.checked);
                        });
                    });
                    scope.$watch(attr.ngChecked, function (checked) {
                        if (typeof checked === 'undefined')
                            checked = !!ngModel.$viewValue;
                        update(checked)
                    }, true);
                    scope.$watch(attr.ngModel, function (model) {
                        $(element).iCheck('update');
                    }, true);
                })
            }
        }
    }]);
app.directive('onlyno', ['$timeout', '$parse', function ($timeout, $parse) {
        return {
            restrict: 'A',
            require: '?ngModel',
            link: function (scope, el, attr, ngModel) {
                $(el).keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                            // Allow: Ctrl+A, Command+A
                                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                                    // Allow: home, end, left, right, down, up
                                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                                // let it happen, don't do anything
                                return;
                            }
                            // Ensure that it is a number and stop the keypress
                            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                            }
                        });
            }
        }
    }]);

app.service('Data', function ($http) {
    this.getProductName = function ($data) {
        return $http.get(site_url + "Products/getProdName?v=1&" + $data);
    };
    this.getProductBarcode = function ($data) {
        return $http.get(site_url + "Products/getProdBarcode?v=1&" + $data);
    };
    this.getProductMargin = function ($data) {
        return $http.get(site_url + "Products/getProdMargin?v=1&" + $data);
    };
    this.getIdAttribute = function ($data) {
        return $http.get(site_url + "products/getIdAttribute?" + $data);
    };
});