var mppApp = angular.module('hoodqApp', ['controllers','directive','ngRoute'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
});
mppApp.constant('siteUrl', '/hoodqclone/public');
