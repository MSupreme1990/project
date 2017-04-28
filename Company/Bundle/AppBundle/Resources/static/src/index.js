import $ from 'jquery';
import FastClick from 'fastclick';
import axios from 'axios';

const fetch = axios.create({
    baseURL: '/',
    timeout: 1000,
    responseType: 'json',
});

$(() => {
    FastClick.attach(document.body);
});
