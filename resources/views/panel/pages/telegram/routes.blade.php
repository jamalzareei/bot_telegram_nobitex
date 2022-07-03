@extends('panel.layout')
  
@section('content')
<section id="data-list-view" class="data-list-view-header">
    <div class="action-btns d-none">
        <div class="btn-dropdown mr-1 mb-1">
            <div class="btn-group dropdown actions-dropodown">
                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable starts -->
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th></th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>POPULARITY</th>
                    <th>ORDER STATUS</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td class="product-name">Apple Watch series 4 GPS</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-success">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:97%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$69.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Beats HeadPhones</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:83%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text">Delivered</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$69.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Altec Lansing - Bluetooth Speaker</td>
                    <td class="product-category">Audio</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:57%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text">canceled</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Aluratek - Bluetooth Audio Receiver</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:65%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$29.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Aluratek - Bluetooth Audio Transmitter</td>
                    <td class="product-category">Audio</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text">canceled</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Basis - Peak Fitness and Sleep Tracker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:47%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Antec - Nano Diamond Thermal Compound</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:55%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">pending</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$29.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Antec - SmartBean Bluetooth Adapter</td>
                    <td class="product-category">Computer</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:63%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text">canceled</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$39.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Beats by Dr. Dre - 3' USB-to-Micro USB Cable</td>
                    <td class="product-category">Computer</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text">delivered</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Beats by Dr. Dre - Bike Mount for Pill Speakers</td>
                    <td class="product-category">Audio</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:40%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">delivered</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$49.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Bose® - SoundLink® Color Bluetooth Speaker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:90%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">pending</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$129.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">BRAVEN - Portable Bluetooth Speaker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Craig - Portable Wireless Speaker</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-danger">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:20%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text">canceled</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Definitive Technology - Wireless Speaker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:75%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">pending</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$399.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Fitbit - Charge HR Activity Tracker + Heart Rate (Large)</td>
                    <td class="product-category">Audio</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:60%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">pending</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$149.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Fitbit - Flex 1" USB Charging Cable</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$14.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Fitbit - Activity Tracker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-danger">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:35%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text">canceled</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$99.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Fitbit - Charge Wireless Activity Tracker (Large)</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">pending</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$129.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Craig - Tower Speaker</td>
                    <td class="product-category">Audio</td>
                    <td>
                        <div class="progress progress-bar-warning">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:68%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$69.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">BRAVEN - Outdoor Speaker</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:97%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text">delivered</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Bose® - Bluetooth Speaker Travel Bag</td>
                    <td class="product-category">Computers</td>
                    <td>
                        <div class="progress progress-bar-primary">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:89%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-warning">
                            <div class="chip-body">
                                <div class="chip-text">on hold</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$44.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="product-name">Altec Lansing - Mini H2O Bluetooth Speaker</td>
                    <td class="product-category">Fitness</td>
                    <td>
                        <div class="progress progress-bar-success">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                aria-valuemax="100" style="width:87%"></div>
                        </div>
                    </td>
                    <td>
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text">delivered</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-price">$199.99</td>
                    <td class="product-action">
                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- DataTable ends -->

    <!-- add new sidebar starts -->
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data">
            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                <div>
                    <h4 class="text-uppercase">مسیر جدید</h4>
                </div>
                <div class="hide-data-sidebar">
                    <i class="feather icon-x"></i>
                </div>
            </div>
            <div class="data-items pb-3">
                <div class="data-fields px-2 mt-3">
                    <div class="row">
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">نام</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">متن</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-category"> پرنت </label>
                            <select class="form-control" id="data-category">
                                <option>Audio</option>
                                <option>Computers</option>
                                <option>Fitness</option>
                                <option>Appliance</option>
                            </select>
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-status">مسیر بعدی</label>
                            <select class="form-control" id="data-status">
                                <option>Pending</option>
                                <option>Canceled</option>
                                <option>Delivered</option>
                                <option>On Hold</option>
                            </select>
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-status">نوع</label>
                            <select class="form-control" id="data-status">
                                <option value="text">text</option>
                                <option value="keyboard">keyboard</option>
                                <option value="inline_keyboard">inline_keyboard</option>
                            </select>
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">آدرس اینترنتی</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">اسلاگ (callback_data)</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">نوع فرزندان (children_type)</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">اسلاگ یکسان شده (same_callback_data)</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">جزئیات (details)</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        
                        <div class="col-sm-12 data-field-col">
                            <label for="data-name">کنترلر_متد (controller@method)</label>
                            <input type="text" class="form-control" id="data-name">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-price">chunk_children</label>
                            <input type="text" class="form-control" id="data-price">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-price">فعال</label>
                            <input type="text" class="form-control" id="data-price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                <div class="add-data-btn">
                    <button class="btn btn-primary">Add Data</button>
                </div>
                <div class="cancel-data-btn">
                    <button class="btn btn-outline-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection