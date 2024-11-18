@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <h2><span>Tra cứu</span></h2>
            </div>
            <div class="container mt-5">
                <!-- Search Title -->
                <div class="mb-4">
                    <h3>Search</h3>
                </div>

                <!-- Search Bar -->
                <form class="d-flex mb-4" role="search">
                    <input class="form-control me-2" type="search" placeholder="osteoporosis" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>

                <!-- Filters -->
                <div class="row filters g-2 mb-3">
                    <div class="col-6 col-md-3">
                        <select class="form-select" aria-label="Journal">
                            <option selected>Journal</option>
                            <option value="1">Nature</option>
                            <option value="2">Pediatrics</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <select class="form-select" aria-label="Article Type">
                            <option selected>Article type</option>
                            <option value="1">Research</option>
                            <option value="2">Review</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <select class="form-select" aria-label="Subject">
                            <option selected>Subject</option>
                            <option value="1">Biology</option>
                            <option value="2">Chemistry</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <select class="form-select" aria-label="Date">
                            <option selected>Date</option>
                            <option value="1">2023</option>
                            <option value="2">2022</option>
                        </select>
                    </div>
                    <div class="col-12 text-end mt-2">
                        <a href="#" class="btn btn-link">Clear all filters</a>
                    </div>
                </div>

                <!-- Sort By -->
                <div class="d-flex justify-content-between align-items-center flex-wrap sort-options mb-3">
                    <p class="mb-2 mb-md-0">Showing 1–16 of 16 results</p>
                    <div>
                        <span class="me-2">Sort by:</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sortOptions" id="sortRelevance" value="relevance" checked>
                            <label class="form-check-label" for="sortRelevance">Relevance</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sortOptions" id="sortDate" value="date">
                            <label class="form-check-label" for="sortDate">Date published</label>
                        </div>
                    </div>
                </div>

                <!-- Results List -->
                <div class="list-group">
                    <div class="list-group-item">
                        <p class="text-primary mb-1">Research <span class="badge bg-success ms-2">Open Access</span></p>
                        <h5 class="mb-1"><a href="#" class="text-decoration-none text-primary">Density functional theory calculation of interaction between bisphosphate and farnesyl pyrophosphate synthase</a></h5>
                        <p class="mb-0">Kazuki Ohno, Kenichi Mori ... Makoto Takeuchi</p>
                        <small class="text-muted">08 Sept 2010 • Nature Precedings • P: 1</small>
                    </div>
                    <hr>
                    <div class="list-group-item">
                        <p class="text-primary mb-1">Research</p>
                        <h5 class="mb-1"><a href="#" class="text-decoration-none text-primary">844 Evaluation of Iron Chelation Therapy in Beta Thalassemia Major Patients in East Delta of Egypt</a></h5>
                        <p class="mb-0">M Badr, M Hesham ... S M Badawy</p>
                        <small class="text-muted">01 Nov 2010 • Pediatric Research • Volume: 68, P: 423</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            @include('frontend.components._single_sidebar')
        </div>
    </div>
</section>
<style>
    .filters,
    .sort-options {
        flex-wrap: wrap;
    }

    .list-group-item {
        word-wrap: break-word;
    }

    .panel-blog {
        background: #004489;
        color: white;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .panel-blog h2 {
        padding: 10px;
    }
</style>
@endsection