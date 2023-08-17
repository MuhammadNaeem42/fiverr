<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>{{ trans('categories.category') }} | {{ setting('application_name') }} </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!-- Start izitoast css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet"/>
    <!-- End izitoast css-->
    <link href="{{asset('css/signaturepad/jquery.signaturepad.css')}}" rel="stylesheet"/>

    <style>::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        body {
            background-color: #ffe8d2;
            font-family: 'Cairo', sans-serif
        }

        .card {
            border: none
        }

        .logo {
            background-color: #eeeeeea8
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }</style>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo+Slab:wght@400;600;700&family=Cairo:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        body, small, a, p, .blockquote, .post-quote blockquote, .lang-label, .pricing-box-alt, .pullquote-left, .pullquote-right, span .sub-menu-container .menu-item > .menu-link, .wp-caption, .fbox-center.fbox-italic p, .skills li .progress-percent .counter, .nav-tree ul ul a, .font-body, h1, h2, h3, h4, h5, h6, #logo a, .menu-link, .mega-menu-style-2 .mega-menu-title > .menu-link, .top-search-form input, .entry-link, .entry.entry-date-section span, .button.button-desc, .fbox-content h3, .tab-nav-lg li a, .counter, label, .widget-filter-links li a, .nav-tree li a, .wedding-head, .entry-link span, .entry blockquote p, .more-link, .comment-content .comment-author span, .comment-content .comment-author span a, .button.button-desc span, .testi-content p, .team-title span, .before-heading, .wedding-head .first-name span, .wedding-head .last-name span, .font-secondary {
            font-family: 'Cairo', 'Open Sans', sans-serif !important;
        }
    </style>
</head>
<body className='snippet-body' style=" direction: rtl;text-align: right;">
<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="card">


                <div class="text-left logo p-2 px-5">

                    <img src="{{asset(setting('logo'))}}" width="50">
                    <strong>{{setting('application_name')}}</strong>


                </div>

                <div class="invoice p-5">
                    <div class="my-2">
                        <a href="{{$category->file}}" class="me-2 btn btn-xs px-2 m-1 light btn-primary" download="">
                            <i class="fa fa-download" style="font-size: 16px;"></i> تحميل العقد
                        </a>
                        <a href="{{$category->file}}" target="_blank"
                           class="me-2 btn btn-xs px-2 m-1 light btn-warning text-white">
                            <i class="fa fa-file-pdf-o" style="font-size: 16px;"></i> معاينة العقد
                        </a>
                    </div>
                    <h5>رقم العقد: {{ $category->number }}</h5>

                    <table>
                        <tr>
                            <th>{{trans('categories.seller_name')}} :</th>
                            <td>{{$category->seller->name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('categories.investor_name')}} :</th>
                            <td>{{$category->investor->name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('categories.status')}} :</th>
                            <td>{{trans('categories.status_array.' . $category->status)}}</td>
                        </tr>
                    </table>

                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                        <table class="table table-borderless">

                            <tbody>
                            <tr>
                                <td>
                                    <div class="py-2">

                                        <span class="d-block text-muted">{{trans('categories.created_at')}}</span>
                                        <span>{{ $category->created_at }}</span>

                                    </div>
                                </td>

                                <td>
                                    <div class="py-2">

                                        <span class="d-block text-muted">{{trans('categories.start_at')}}</span>
                                        <span>{{ $category->start_at }}</span>

                                    </div>
                                </td>
                                <td>
                                    <div class="py-2">

                                        <span class="d-block text-muted">{{trans('categories.end_at')}}</span>
                                        <span>{{ $category->end_at }}</span>

                                    </div>
                                </td>
                                <td>
                                    <div class="py-2">

                                        <span class="d-block text-muted">{{trans('categories.address')}}</span>
                                        <span>{{ $category->address }}</span>

                                    </div>
                                </td>
                            </tr>
                            </tbody>

                        </table>


                    </div>


                    <div class="product border-bottom table-responsive">

                        <table class="table table-borderless">

                            <tbody>
                            <tr>
                                <td width="80%">
                                    <span class="font-weight-bold">{{trans('categories.total')}}</span>
                                    <div class="product-qty">
                                        <span class="d-block">{{$category->notes}}</span>


                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="text-right">
                                        <span
                                            class="font-weight-bold">{{$category->total}} {{setting('currency','د.ك')}}</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                        </table>


                    </div>


                    <div class="row d-flex justify-content-end">

                        <div class="col-md-5">

                            <table class="table table-borderless">

                                <tbody class="totals">

                                <tr>
                                    <td>
                                        <div class="text-left">

                                            <span class="text-muted">{{trans('categories.subtotal')}}</span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>{{getSubTotalAfterFees($category->total)}} {{setting('currency','د.ك')}}</span>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="text-left">

                                            <span class="text-muted">{{trans('categories.fees')}}</span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>{{getTotalFees($category->total)}} {{setting('currency','د.ك')}}</span>
                                        </div>
                                    </td>
                                </tr>


                                <tr class="border-top border-bottom">
                                    <td>
                                        <div class="text-left">

                                            <span class="font-weight-bold">{{trans('categories.grand_total')}}</span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span class="font-weight-bold">{{$category->total}}</span>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>

                            </table>

                        </div>


                    </div>

                    <div class="row">
                        @if($category->status==\App\Models\Contract::$CONTRACT_STATUS_WAITING_ADMIN_SIGNATURE )
                            <form id="signature_form" method="post"
                                  action="{{route('admin.categories.signature',$category->id)}}">
                                @csrf
                                <div class="sigPad" id="linear" style="width:234px">
                                    <ul class="sigNav">
                                        <li class="drawIt"><a href="#draw-it">{{trans('categories.signature')}}</a></li>
                                        <li class="clearButton"><a href="#clear">{{trans('categories.clear')}}</a></li>
                                    </ul>
                                    <div class="sig sigWrapper" style="height:auto;">
                                        <div class="typed"></div>
                                        <canvas class="pad" width="230px" height="150"></canvas>
                                        <input type="hidden" name="output" class="output">
                                        <input type="hidden" name="image_output_based64" id="image_output_based64">
                                    </div>
                                </div>
                                <button type="submit"
                                        onclick="event.preventDefault(); $('#image_output_based64').val(instance.getSignatureImage()); $('#signature_form').submit();"
                                        class="btn btn-success btn-xs  px-2 m-1"
                                        title="{{ trans('categories.status_array.' . \App\Models\Contract::$CONTRACT_STATUS_WAITING_INVESTOR_SIGNATURE)}}">
                                    <i
                                        class="fa fa-pencil"></i> {{trans('categories.signature')}}
                                </button>
                            </form>
                        @endif

                    </div>


                    <p class="font-weight-bold mb-0 text-center">{{setting('footer_category_invoice')}}</p>


                </div>


                <div class="d-flex justify-content-between footer p-3">

                    <span>Need Help? Call our <a href="tel:{{setting('phone')}}"> {{setting('phone')}}</a></span>
                    <span>{{Carbon\Carbon::now()->format('Y-m-d')}}</span>

                </div>


            </div>

        </div>

    </div>

</div>
<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<!-- json2.js -->
<script src="{{asset('js/signaturepad/json2.min.js')}}"></script>

<!-- signature pad -->
<script src="{{asset('js/signaturepad/jquery.signaturepad.js')}}"></script>

{{--<script src="{{asset('js/signaturepad/flashcanvas.js')}}"></script>--}}

<script>
    $(document).ready(function () {
        window.instance = $('.sigPad').signaturePad({

            // What action should be highlighted first: typeIt or drawIt
            defaultAction: 'typeIt',

            // Initialize canvas for signature display only; ignore buttons and inputs
            displayOnly: false,

            // Whether the to allow a typed signature or not
            drawOnly: true,

            // Selector for selecting the canvas element
            canvas: 'canvas',

            // Parts of the signature form that require Javascript (hidden by default)
            sig: '.sig',

            // The TypeIt/DrawIt navigation (hidden by default)
            sigNav: '.sigNav',

            // The colour fill for the background of the canvas; or transparent
            bgColour: '#ffffff',

            // Colour of the drawing ink
            penColour: '#145394',

            // Thickness of the pen
            penWidth: 2,

            // Determines how the end points of each line are drawn (values: 'butt', 'round', 'square')
            penCap: 'round',

            // Colour of the signature line
            lineColour: '#ccc',

            // Thickness of the signature line
            lineWidth: 2,

            // Margin on right and left of signature line
            lineMargin: 5,

            // Distance to draw the line from the top
            lineTop: 130,

            // The input field for typing a name
            name: '.name',

            // The Html element to accept the printed name
            typed: '.typed',

            // Button for clearing the canvas
            clear: '.clearButton',

            // Button to trigger name typing actions (current by default)
            typeIt: '.typeIt a',

            // Button to trigger name drawing actions
            drawIt: '.drawIt a',

            // The description for TypeIt actions
            typeItDesc: '.typeItDesc',

            // The description for DrawIt actions (hidden by default)
            drawItDesc: '.drawItDesc',

            // The hidden input field for remembering line coordinates
            output: '.output',

            // The class used to mark items as being currently active
            currentClass: 'current',

            // Whether the name, draw fields should be vali<a href="https://www.jqueryscript.net/time-clock/">date</a>d
            validateFields: true,

            // The class applied to the new error Html element
            errorClass: 'error',

            // The error message displayed on invalid submission
            errorMessage: 'Please enter your name',

            // The error message displayed when drawOnly and no signature is drawn
            errorMessageDraw: 'Please sign the document'

        });

    });
</script>
@include('includes.notify.success')
@include('includes.notify.errors')

</body>
</html>"
