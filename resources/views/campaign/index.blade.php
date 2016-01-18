@extends('layouts.main')

@section('title', 'Campañas')

@section('head_scripts')
@stop

@section('content')
    <div id="page_content">
        <div id="page_content_inner">

            <div class="md-card-list-wrapper" id="mailbox">
                <div class="uk-width-large-8-10 uk-container-center">
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Today</div>
                        <div class="md-card-list-header md-card-list-header-combined heading_list" style="display: none">All Messages</div>
                        <ul class="hierarchical_slide">
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">7 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">um</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>arturo.simonis@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>arturo.simonis@gmail.com</span>
                                    </div>
                                    <span>Ut nesciunt ullam blanditiis nostrum deserunt deleniti porro.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_931">Reply to <span>arturo.simonis@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_931" id="mailbox_reply_931" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">7 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">bu</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Alford Pacocha</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Alford Pacocha</span>
                                    </div>
                                    <span>Soluta eos facere voluptatem sed sed aut.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1363">Reply to <span>Alford Pacocha</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1363" id="mailbox_reply_1363" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">7 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">rf</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>will.orrin@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>will.orrin@gmail.com</span>
                                    </div>
                                    <span>Repellendus voluptatem doloremque ea molestiae corporis qui animi.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_553">Reply to <span>will.orrin@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_553" id="mailbox_reply_553" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">7 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_04_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>joanne01@hotmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>joanne01@hotmail.com</span>
                                    </div>
                                    <span>Eaque iusto amet aut ut aut et est blanditiis aut autem.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1027">Reply to <span>joanne01@hotmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1027" id="mailbox_reply_1027" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Yesterday</div>
                        <ul class="hierarchical_slide">
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">ps</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Adaline Abernathy Jr.</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Adaline Abernathy Jr.</span>
                                    </div>
                                    <span>Ipsa natus distinctio ducimus cumque facere excepturi dolor cupiditate aut assumenda.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Similique beatae architecto et ea corporis dolores harum eius aperiam doloremque aut dolores labore aut id officia aut sunt totam neque qui numquam similique aut veritatis laboriosam aliquid optio velit voluptate et qui dignissimos deleniti rerum quaerat iste aperiam corrupti ea minus ex rerum animi eaque quam hic facilis et maxime deserunt accusamus veniam error ut voluptatem deserunt assumenda dolores non adipisci a cumque aut at voluptas voluptatem veniam ea expedita esse rerum esse officia omnis non nostrum corrupti velit beatae minima autem voluptas error sunt cumque qui consequuntur ea illo nostrum id quia sequi minima explicabo ullam sunt mollitia reprehenderit quis cum sed sed hic fugiat voluptatem natus fugit et doloremque vel voluptatem tempora laborum sed deleniti modi dignissimos eos autem qui rerum consequatur quia doloribus tempore nostrum aperiam aperiam quisquam sint quas sed quia ab quia quas aliquid sit omnis consequatur totam ut culpa quis aut quod voluptas autem laboriosam provident repellat maxime harum et quo assumenda debitis beatae harum qui vitae iure distinctio sint sit delectus ut similique distinctio voluptate tempore praesentium dolorum atque omnis illum facilis culpa inventore at inventore ipsum aspernatur assumenda eum rerum optio consequatur reiciendis et iste est optio quidem nemo assumenda beatae odio est alias vel quia a sunt quia quasi nostrum vel dicta esse ipsa quibusdam reprehenderit quibusdam labore mollitia nobis qui reiciendis repellat delectus qui architecto architecto sint quo aperiam cumque rem et voluptas rerum mollitia ea libero quis voluptatem iusto repudiandae aliquid voluptatem dolores et autem dolores quis veritatis in odio molestias nostrum est et asperiores enim ullam recusandae quis et sit adipisci in voluptates nemo enim velit quo molestias consequatur odio autem ut sed dolorum consequatur non quis qui reiciendis nisi quia labore saepe natus officiis qui deleniti voluptatem commodi ratione nemo illum ea magnam sequi ducimus dolores earum dolore facere exercitationem cumque repellendus aut voluptas voluptate nihil et sunt a molestias praesentium aut dicta eos numquam omnis magni voluptatem consequatur et atque sit neque et quia quia enim quis et in aliquid dolores ut dolores quisquam accusamus illo provident voluptas autem suscipit adipisci rerum eius repudiandae neque quia dignissimos vel dicta quidem et tenetur amet officia quibusdam incidunt rerum totam veniam voluptatum minus sapiente eos voluptatem eaque consequatur voluptatibus eveniet natus consequatur fugit magni voluptatum quas in aut aut eaque atque illo voluptate amet beatae architecto animi praesentium magni aut temporibus voluptatum architecto et recusandae atque dicta esse excepturi iure aspernatur quia ut eos perspiciatis dolorum harum qui odio totam nisi aut dolores rerum qui quod exercitationem quam ratione consequatur quibusdam totam adipisci reiciendis velit quis voluptatem magni saepe iure qui rerum quibusdam mollitia voluptatem non nam mollitia blanditiis sit non odio minus quasi in et repellat omnis laboriosam omnis mollitia autem iste corrupti debitis mollitia dolor sequi deleniti eligendi labore beatae sunt mollitia ab reprehenderit eius tenetur et totam optio a omnis sequi ut dolores voluptatem et et suscipit tempore assumenda maiores animi recusandae dolor perspiciatis est aperiam quidem inventore vel dolorem labore ut a sunt vel incidunt ad et quia provident est veritatis sed molestiae autem voluptas recusandae autem rerum et culpa culpa quis excepturi unde non neque eveniet sunt veritatis voluptatibus sapiente fuga blanditiis praesentium sed tempore et ut saepe occaecati possimus eaque consequatur natus quia ut blanditiis repellendus non vero vel eius doloribus facere quia ea occaecati voluptatem unde iste consequuntur dolor sed reiciendis voluptas nostrum sapiente ex perspiciatis ex odit quidem maxime alias.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1991">Reply to <span>Adaline Abernathy Jr.</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1991" id="mailbox_reply_1991" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_02_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>zwindler@nolan.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>zwindler@nolan.com</span>
                                    </div>
                                    <span>Ex culpa architecto ut qui nulla et sit iste deserunt assumenda beatae.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Nam vero explicabo laborum est ducimus ut iste rerum consequatur temporibus quos vel dolores exercitationem quia sunt inventore nulla consequatur est nemo perspiciatis accusamus ut ipsam quasi et aut sed dolores aut aliquam id itaque dolore aut laborum mollitia id fugiat repellat dolore voluptatem earum vero quia accusamus et in quam laudantium modi doloribus exercitationem et corrupti excepturi neque et modi fugit impedit et id quae ab quia blanditiis dolor doloribus illo quia unde voluptas dolorem amet consequatur dicta atque enim aut eum blanditiis commodi quaerat amet voluptas sapiente iure est ipsam illum blanditiis labore ut quo rerum quas repudiandae doloribus enim labore quia ipsam consequatur qui et sed eum possimus veritatis iste omnis quos voluptatem molestiae quod ipsa ut nemo fugit ipsum et sint et dolorum voluptate quaerat et temporibus quia nihil et vitae repudiandae sint qui et assumenda iste sed magnam tenetur molestias facere quidem perspiciatis rerum non est expedita dicta explicabo suscipit corrupti nihil error incidunt porro dolores doloremque illum architecto maxime ut fuga aut eos dolore omnis enim qui ut accusantium hic facere expedita quod et quod est modi maiores in natus animi est nam perferendis quis voluptatibus reprehenderit sed ratione non nisi exercitationem dignissimos officiis aut autem soluta soluta cumque sequi quis repellat aspernatur iusto harum exercitationem autem nihil quo in dolore veritatis occaecati possimus id velit qui ipsam nisi eaque tenetur consequatur in quam reprehenderit necessitatibus amet iusto dolorum ut ad id error voluptatem enim optio est rerum aliquid tempora aspernatur vel dignissimos animi labore praesentium optio sint optio culpa est suscipit porro velit ut illum aut aliquam accusamus illum consequatur laboriosam maiores enim enim rerum accusantium ullam facere velit ipsa quidem libero maxime libero at consequuntur dignissimos repudiandae adipisci exercitationem est ut enim soluta sunt quaerat non sed nobis rerum commodi et voluptatum laboriosam quos odio aut itaque alias esse et aut beatae repellendus dolore omnis dolor distinctio et voluptatum dolor repudiandae recusandae tempora expedita eos ipsa quis et animi dignissimos iste eum illo unde temporibus blanditiis ipsam unde sit neque voluptas deserunt itaque non placeat officia odio ad quis est incidunt et vel soluta laboriosam eos odit laboriosam voluptate quasi facere voluptatem natus quasi vel nemo ratione rerum ea delectus et quo harum et autem beatae fugit quam suscipit maiores distinctio aperiam quia optio et blanditiis veniam voluptatem minus harum cupiditate consectetur aliquid dolorem in enim enim autem expedita quidem beatae fugit quam nam natus tempora tempore voluptatibus est molestiae corporis maxime et veritatis debitis et provident enim consectetur maxime ex possimus deserunt dignissimos nostrum sit ratione ullam qui quis cum provident fuga occaecati omnis omnis quibusdam ut rerum cum dicta natus corporis nihil sequi voluptas amet et non temporibus rerum alias perferendis mollitia ut dignissimos quia cum dolor quia sed delectus impedit enim velit qui rerum libero quo nam quia harum sed dignissimos ex consectetur quidem aspernatur sapiente placeat voluptates debitis velit quia est et officia aut architecto reprehenderit cupiditate maxime reiciendis occaecati beatae delectus vitae quae quae voluptatem aliquid quidem earum dolorem qui velit aut cupiditate aut ut voluptatem excepturi qui et labore rerum corrupti est nemo voluptatibus omnis omnis natus assumenda pariatur fugiat neque praesentium voluptatem saepe eaque magni hic reprehenderit blanditiis omnis qui quo repellendus ea et eaque est error non explicabo rerum ut aut sed sed excepturi necessitatibus sapiente autem sunt reprehenderit ex rerum nobis cupiditate delectus ullam nobis dolorem quia et corporis voluptas pariatur deserunt id esse iure quia eum totam quaerat cupiditate ea voluptatum quo esse sint perferendis quaerat quo possimus animi facilis dolores rerum qui labore est ut minus veniam omnis soluta tempora possimus natus magni distinctio non ipsum non facere sit eius quibusdam dignissimos corrupti explicabo et doloremque harum quidem aut nulla et voluptates repudiandae quos sequi laboriosam saepe quos id doloribus facere eos ipsa et alias totam rem et deleniti qui esse rerum vero voluptatibus laborum doloribus omnis id sed cumque eius fugiat nisi sint eum dolorem sint at perferendis cumque tenetur fuga et eligendi inventore fuga consequatur molestiae est laboriosam enim eveniet ea sint suscipit officia sed veritatis voluptatem magnam quibusdam illum dolor voluptas et voluptas laborum similique rem enim quisquam in quis ut ducimus deserunt incidunt quis qui est inventore ipsum vel voluptatem enim omnis dolor dolor fugiat minima voluptatibus voluptates vel saepe ut quia hic est laborum neque eos quibusdam velit et molestiae enim voluptatibus consequuntur odio fugiat libero ex sed unde voluptates repudiandae nobis laborum molestias est ad cum quasi odit pariatur id ut occaecati laboriosam qui tenetur deleniti sapiente porro temporibus eligendi similique exercitationem ex quasi molestiae sed veniam qui vitae sit non officiis error beatae quasi delectus ratione magnam nihil et sint cumque magni fugiat qui libero necessitatibus perferendis in est natus ex eligendi nam aliquam quis nihil quibusdam commodi autem dolores et commodi sed aspernatur et accusamus quaerat iusto nostrum ipsam exercitationem eaque distinctio et qui voluptatem accusantium hic et sequi in tempora at aut odio excepturi sit sit illo accusantium.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_547">Reply to <span>zwindler@nolan.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_547" id="mailbox_reply_547" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_06_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Mrs. Domenica Reichel Jr.</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Mrs. Domenica Reichel Jr.</span>
                                    </div>
                                    <span>Dignissimos quidem praesentium voluptatem quis suscipit dolor minima soluta quasi autem.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Soluta doloribus tempore ea sint repellendus et vero velit itaque reiciendis et ut repellat eum nisi vero quam est voluptate qui quam officiis aliquid cupiditate alias molestiae in dolor quo molestiae ut sunt fuga cupiditate repudiandae at magnam vel aut eos molestiae id cupiditate sit autem sed soluta asperiores nesciunt neque unde laudantium qui quis non illum ipsa voluptatem excepturi id quos sed aliquam sint animi qui suscipit commodi minima velit facilis voluptas nostrum nihil ex veniam est eum quisquam at consequuntur et quibusdam debitis et fugiat nostrum fugit ab illo consequatur cum laudantium blanditiis praesentium doloremque nostrum laboriosam molestiae repellendus iusto corrupti qui dolor doloribus aspernatur recusandae dolores soluta qui qui sed eligendi nam provident nemo ipsum ab neque accusamus distinctio accusamus enim iste voluptatum rerum veritatis laboriosam rerum molestias exercitationem dolores aspernatur quia atque reprehenderit dolore maxime dolor qui iusto repellendus totam maiores in illum molestias est consectetur neque recusandae illum est accusamus ad tenetur veritatis suscipit et et id cum magnam est qui et sed id et rerum ut sapiente ex dolor autem deserunt debitis perferendis est nulla soluta minus impedit dolorem perspiciatis nobis quidem accusantium aliquam voluptatem quo eligendi veniam corrupti voluptatibus rerum illum maiores architecto et iure dolor harum sed quaerat est fuga iure corporis voluptas tempore consequuntur officia adipisci ut distinctio rerum aut iste laudantium excepturi nostrum nesciunt ut ut nesciunt est dolor modi sed tempora corrupti possimus nemo cum voluptatem distinctio tenetur voluptatem dolore ipsa rem voluptatem perspiciatis non incidunt omnis quaerat voluptatem eum voluptate omnis consequatur voluptas fugit reiciendis commodi odio quo sint aspernatur eius fugit ea maxime voluptas minus autem incidunt quia repellat ratione odio dicta exercitationem illo explicabo dignissimos quo sed sit aliquam facilis occaecati est aut harum optio eum in est ullam officiis labore sit et esse similique nostrum laborum repellendus delectus cum cum sapiente ad rem accusantium et quidem quia fugit et quis libero qui nemo natus aliquid officiis provident dolores non explicabo blanditiis et ullam quidem distinctio mollitia ut nemo repellendus ipsum vitae voluptatum iure sint non saepe enim dolores amet similique qui vitae nam suscipit nemo quidem qui nobis sint quia dolores deserunt et non minus quae minima ut mollitia at ut doloribus ipsa sapiente recusandae consequatur aspernatur illum illo odit pariatur rerum minus ullam non dolorem atque beatae praesentium unde officiis blanditiis omnis quis dolor maxime quae magni voluptatum repellendus odit tempora dicta quam repudiandae vel quia explicabo consectetur asperiores dolore enim non veritatis deserunt nihil quis quae magni non rem et tempore voluptatem ut voluptas doloribus et quod ea soluta dolore occaecati officiis omnis autem similique in et doloribus at sed soluta non optio hic aut et alias iusto praesentium sint ut at dicta est omnis quibusdam blanditiis placeat voluptatem dolorem vel est et et voluptate explicabo ut numquam dolores facere et aliquam dicta voluptas provident dicta iure dignissimos ipsam rerum aperiam et sequi quaerat sed earum ullam et cum dolore enim accusantium ipsum in tempora libero officiis accusantium atque eaque omnis unde et voluptatem rem quia ad et sed praesentium minima aliquid omnis ut vel architecto labore porro odit ut molestiae quas non aut aperiam a eaque autem et in soluta ad cum odit similique molestiae voluptas nihil reiciendis ipsa ut cupiditate consequuntur qui voluptatem tenetur culpa modi suscipit sint modi illo ipsa quibusdam possimus quo magnam amet sit eius est ab mollitia ex facere illum vitae dolor ipsa quia veniam ut consequatur distinctio dolorum rerum qui similique blanditiis optio voluptatem ipsum eos animi debitis facilis optio ipsa qui aut facere eum harum repellendus architecto voluptatem aut non autem dolores quam qui repellendus nam iure voluptatem veniam voluptas veniam ea incidunt doloremque esse voluptas dicta sunt rem excepturi facilis autem ipsa recusandae ut esse fuga optio harum neque quia accusantium sunt in debitis delectus enim aperiam laborum sed quia minus veniam debitis sit id sint voluptas sint culpa dolor aut est accusantium libero enim qui sed voluptatibus rerum asperiores quia consequatur minus sequi in quia nihil quia facere unde voluptatibus sapiente vitae eveniet qui inventore dolor eveniet quia reiciendis eligendi in consequatur molestiae ut nostrum quibusdam harum laborum aut officiis eveniet qui quis laborum voluptatem aspernatur omnis numquam illo minima quia nostrum autem autem ducimus magnam et repudiandae vel odit molestiae delectus et eum rerum ipsam at dolorum quis accusamus ut sed sunt et a ullam sapiente tempora et sequi enim ut aut quo sed illo eum atque laboriosam quam magni repudiandae eveniet a qui est velit qui vel fugit molestias rerum qui accusamus in sit placeat voluptas omnis et aut sed voluptate quia laborum eum vel enim placeat cumque repellat et enim saepe ut quaerat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_8840">Reply to <span>Mrs. Domenica Reichel Jr.</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_8840" id="mailbox_reply_8840" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">vw</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>ida.kemmer@schiller.net</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>ida.kemmer@schiller.net</span>
                                    </div>
                                    <span>Eaque ut molestiae ad temporibus deleniti eius sit adipisci autem error id occaecati.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Magni dolorum facilis sed et autem qui placeat et sed unde impedit ab pariatur quis qui provident aliquid recusandae eum voluptatum voluptatem voluptatibus molestias placeat unde dolorem sint quibusdam architecto eos nihil sed quo nobis est praesentium aut dicta veniam quia aperiam magni et a voluptatem voluptates doloribus aut eos sunt dolorem repellendus facere vitae quis totam magni similique quis deserunt ducimus ut molestiae quasi est quia dolores dolore aspernatur omnis dicta quia deleniti nihil id culpa dolor soluta adipisci nam dolore error repellat impedit voluptatem sapiente maxime qui assumenda et est ut voluptatum ipsum quod eos dolor rerum saepe in in dolor repellendus autem modi ad repudiandae molestias et perferendis autem dolore excepturi aliquam velit qui rerum neque voluptatem consequuntur consequatur perferendis qui iusto sit sapiente magnam quos molestiae fugit quia dolorem sit ratione dolorem ut explicabo exercitationem saepe non pariatur veniam et officia error rerum voluptatum earum quos tempore id unde ut pariatur omnis dolor repudiandae aut sit cumque et perferendis quasi repudiandae earum quasi autem sit blanditiis doloribus aperiam in labore aperiam libero rerum a porro vitae est ut aut sapiente ab odit dicta molestiae quia qui at sunt explicabo quaerat iste alias deserunt officiis voluptas dolor.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_3423">Reply to <span>ida.kemmer@schiller.net</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_3423" id="mailbox_reply_3423" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">xk</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>sbins@bosco.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>sbins@bosco.com</span>
                                    </div>
                                    <span>Voluptatum porro perferendis laboriosam incidunt eum est corporis dignissimos.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sint dolor in voluptatem sit et quia rerum quidem suscipit dolorum nam non eveniet quae aperiam eaque sed commodi iusto enim autem dolores illum est dicta repellat nostrum neque sit quae odit voluptatibus eligendi nihil exercitationem quibusdam voluptatibus animi rerum quod veritatis assumenda est vero vero ea id libero quam aut laboriosam facere unde voluptatibus natus et ut consequuntur suscipit molestiae minima aut voluptatem molestias blanditiis libero culpa veritatis repellat est modi dignissimos aut ipsum optio amet nesciunt at modi est eos quia quisquam perspiciatis nihil id illo et in corporis aperiam pariatur ullam aperiam rem esse nemo ab eos veniam ut corrupti natus incidunt dolores consequatur corrupti dolor explicabo sit voluptas unde ut similique deleniti nostrum sit sed aut et aspernatur qui itaque doloribus velit corporis veritatis qui suscipit quasi voluptatem magni expedita consectetur quas impedit ut dignissimos vitae sint consequuntur possimus reprehenderit minus est debitis temporibus vero est non similique velit voluptate laboriosam et eius accusantium ipsam fugit enim deserunt unde eum nam praesentium ut repellendus iusto perspiciatis magni sit voluptatem consectetur fugit saepe a optio architecto exercitationem repellat ad veniam eaque natus iusto porro aliquam minima sit temporibus dolores optio enim eligendi nulla et aut dolores non voluptatem aut ut veritatis et cum unde a quos quidem ut eius consequatur aut ab est quas quia dolor est qui eos hic earum sunt officiis vel velit rerum odit recusandae nihil eos officiis repudiandae impedit quos veritatis deserunt voluptatem aspernatur similique dolore accusantium nemo sapiente qui voluptas nostrum qui pariatur adipisci ullam nesciunt impedit placeat quas beatae similique impedit nisi omnis velit ea voluptate autem explicabo quisquam ut et consequatur ad autem ab architecto et ullam sit perspiciatis accusantium vitae qui dolore minima voluptatem officiis eos et quis aliquam aut qui iusto molestiae doloribus consequatur iure doloribus veritatis qui magni at mollitia tempore maxime doloribus dolor non qui occaecati odio atque a et nisi odit vero dolore tempora qui autem autem quasi dolor explicabo distinctio consequatur quam et harum necessitatibus recusandae tempore accusantium distinctio aut perferendis eius ad libero maxime aut numquam molestias repellat pariatur qui minima voluptatem ut fugit quia vero nihil dolorem quia illum adipisci qui hic dolorem distinctio consequatur ducimus officiis harum aut reprehenderit ad necessitatibus nihil optio suscipit quaerat tenetur repellendus maxime voluptas perspiciatis ut rerum est aut repudiandae sint impedit omnis vero excepturi qui aspernatur nam quasi amet repellat doloremque laudantium voluptas nam esse sit in modi quod ducimus omnis ut necessitatibus quod exercitationem in autem et occaecati voluptates molestiae corrupti aliquid architecto non voluptates aut aut officia sed facere nostrum sint recusandae quo at harum commodi a iure debitis provident porro et et sunt omnis neque nam vitae voluptas pariatur nisi aut provident qui temporibus et ut animi velit amet minus adipisci quam aliquid voluptate sed itaque numquam molestias distinctio magni facere officiis expedita aut nemo earum voluptate ut itaque voluptatum eos sit quia est voluptas excepturi ab minima sunt omnis minima exercitationem beatae laborum voluptates non sapiente quos ducimus possimus eum nam iste commodi dolorem modi quo ullam qui fugit soluta cupiditate aut ipsa et delectus nihil placeat culpa temporibus odio accusantium sequi et ratione nihil necessitatibus id odio ex dolorem distinctio quisquam et voluptatem laboriosam possimus recusandae cum eius corporis quis quo quia magnam iure expedita saepe voluptatem reiciendis modi sed et possimus sapiente cumque ipsa quasi sunt ipsum non modi et libero temporibus beatae voluptates et iste ullam provident in numquam reprehenderit sed in sunt itaque nulla dolorem alias velit illo tenetur sit libero dolore nostrum quibusdam nesciunt architecto non suscipit quasi corporis reiciendis enim dicta eaque quia facilis cupiditate aut sit adipisci velit totam dolorem pariatur et explicabo molestias voluptatem iure aut ab deleniti quidem iure ut eaque ad est non est et repellat ipsum aut assumenda delectus suscipit quia perferendis vel voluptatem ut quo quas culpa enim voluptas sit velit quia veniam fuga aperiam consequuntur quam dolorem et suscipit ipsum voluptates esse excepturi consectetur doloribus et necessitatibus quos totam aut cupiditate est nobis sed eum est nam culpa dicta ducimus consectetur nulla voluptates sunt repellat ut dolorum aut beatae adipisci fugiat quia exercitationem velit sed dicta amet laboriosam et eaque id quam consequatur praesentium eligendi fugit architecto omnis recusandae iusto expedita temporibus velit quia veniam enim expedita sapiente excepturi non quisquam et voluptas ullam et at error cupiditate aut molestias facere omnis inventore sed et soluta quia aut illum rerum magni harum ad qui consectetur qui culpa voluptas et nobis necessitatibus vel tenetur odio.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_8432">Reply to <span>sbins@bosco.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_8432" id="mailbox_reply_8432" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">yi</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>ernie88@hoegerprohaska.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>ernie88@hoegerprohaska.com</span>
                                    </div>
                                    <span>Voluptatibus eum pariatur repellat veniam quis officia dicta dolorem fuga ea repellat quis harum.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Reprehenderit aut dolorem sequi aliquid ut ab dolor repellendus est enim dolorem possimus iusto dolorem maiores sed beatae libero fugit tempora mollitia et officiis distinctio quo ipsam nihil et et aspernatur temporibus nihil saepe dolorem qui labore voluptas ut beatae doloribus laudantium odio totam temporibus eum eos inventore rerum corrupti quae tempora velit eaque magni omnis aut nobis nihil qui rerum corporis voluptatem rerum ipsum quia facilis perferendis aperiam sed possimus voluptas dicta laborum illo molestiae voluptatem ullam iste ratione dolor delectus incidunt odit velit inventore nisi consequatur blanditiis itaque est dolorem fugit accusamus veritatis illum et quis ab dicta qui adipisci recusandae non deserunt molestias quia et ipsam rerum explicabo sapiente laboriosam est fugiat quia veritatis ea vel aliquam est soluta temporibus inventore ea impedit nihil iste et velit maxime blanditiis delectus quis in sunt consequatur natus rem quo eum dolorem dicta ea voluptas provident nesciunt odio adipisci pariatur consequuntur corporis quos fugit omnis doloremque qui sequi aut et voluptatem voluptatibus quia molestiae culpa quo ea dolores sit ipsam necessitatibus rerum hic deleniti illum aut architecto et eum ut sint vitae illum ipsa a eos quaerat temporibus illo non qui eveniet vel nobis exercitationem eos voluptate sit quo amet et nesciunt non quia aliquid facere mollitia in fuga ex a accusamus tempore et voluptatibus est adipisci et iure id ducimus qui saepe illo quaerat et nobis sequi earum asperiores asperiores alias et aspernatur assumenda numquam ea quaerat excepturi qui rerum quos fugiat nobis sed repudiandae iure quia et quos harum sunt ea debitis hic ea quam odio magni repellendus consequatur voluptatum illo provident et natus nulla magnam minima reiciendis ut neque ut minima et eveniet perspiciatis omnis amet nihil aperiam quo doloribus recusandae voluptatem et at dolore maiores culpa voluptatem dignissimos voluptatibus at non eos porro et voluptatem iusto omnis in unde atque nesciunt amet inventore et rerum laboriosam earum sapiente praesentium quia quis ipsa iure vero quo labore quis nihil possimus ea enim ab earum corporis quis adipisci impedit sed illum et quo inventore magnam rerum ducimus ex magni ut nihil repellendus consequatur facilis vero molestiae qui natus officiis aut modi amet et placeat et aut corporis et id aliquid ut minus tempore et unde mollitia id vitae adipisci dolores voluptatum est ut repudiandae possimus eaque autem ut sint itaque accusamus.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_6001">Reply to <span>ernie88@hoegerprohaska.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_6001" id="mailbox_reply_6001" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_05_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>zgreenfelder@hotmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>zgreenfelder@hotmail.com</span>
                                    </div>
                                    <span>Incidunt est non ipsam voluptatem repellendus ut repellendus non.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Perspiciatis unde voluptatibus rem rerum harum repudiandae assumenda eligendi voluptatem cumque iusto non mollitia unde architecto dolor sit quod ex labore inventore voluptatem quam tempora commodi dignissimos eos ut soluta omnis dignissimos id deserunt ducimus dolorem quia corporis optio eaque et sequi aut omnis deserunt id id saepe ducimus accusamus quam excepturi eveniet quidem omnis et quidem rerum harum consectetur aperiam omnis tenetur sint esse autem nesciunt amet cumque atque similique et est quae voluptates architecto nihil rerum est mollitia explicabo sapiente aut est dolor molestiae eos mollitia sequi et labore et voluptatem dicta voluptate voluptatem illum quia earum exercitationem reprehenderit quia magnam sunt ad porro laboriosam ullam quis quia expedita sapiente adipisci voluptas excepturi aperiam magnam beatae dolorem reiciendis perspiciatis nulla maiores et beatae quisquam in velit labore delectus fugit id beatae eos nisi alias et est aliquam ut sit expedita accusantium quos voluptas neque excepturi possimus laudantium deleniti et quaerat quibusdam voluptatem at vitae accusamus odio quam laudantium reiciendis sequi nemo esse magni est id debitis quia et sunt consequatur quas sint laudantium est laboriosam veniam enim repellendus eos et voluptatem cupiditate reiciendis labore ullam voluptas recusandae ea velit laborum unde soluta qui explicabo impedit in debitis occaecati ut ab reprehenderit quia est labore odio quaerat hic modi autem perferendis ut eum aut ducimus tempore dolorum et est enim in id ea velit consequatur deleniti natus voluptatem facilis eveniet rem animi temporibus iste sequi est quo placeat asperiores est exercitationem cumque pariatur porro suscipit magni culpa sint voluptas sint laboriosam et ducimus perspiciatis asperiores similique repellat nihil molestiae harum laborum repellat assumenda dolorem qui qui qui ad repellat quia quo perferendis adipisci ratione iusto recusandae sint rerum optio commodi natus in ducimus dicta qui quia amet harum architecto totam ut laborum harum quia in optio illum cum dicta enim eligendi.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_7338">Reply to <span>zgreenfelder@hotmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_7338" id="mailbox_reply_7338" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">This Month</div>
                        <ul class="hierarchical_slide">
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_04_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Ellsworth Dach</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Ellsworth Dach</span>
                                    </div>
                                    <span>Impedit enim aut consectetur et libero eum ratione animi et.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1444">Reply to <span>Ellsworth Dach</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1444" id="mailbox_reply_1444" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">xw</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>kemmer.ronny@purdyokon.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>kemmer.ronny@purdyokon.com</span>
                                    </div>
                                    <span>Ut totam porro deleniti debitis labore maiores consectetur facilis in impedit.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2343">Reply to <span>kemmer.ronny@purdyokon.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2343" id="mailbox_reply_2343" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">5 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_02_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>cwalker@schaefergutmann.info</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>cwalker@schaefergutmann.info</span>
                                    </div>
                                    <span>Et nihil qui dolor et quaerat illo ut sed quibusdam illum ratione facere aut.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2698">Reply to <span>cwalker@schaefergutmann.info</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2698" id="mailbox_reply_2698" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">5 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">sm</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Devon Greenholt</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Devon Greenholt</span>
                                    </div>
                                    <span>Aut quos voluptatibus alias omnis sit voluptates blanditiis.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2475">Reply to <span>Devon Greenholt</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2475" id="mailbox_reply_2475" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">5 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">vs</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>raynor.paula@glover.net</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>raynor.paula@glover.net</span>
                                    </div>
                                    <span>Reprehenderit labore debitis sequi aperiam sint maxime facere animi et repudiandae.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1633">Reply to <span>raynor.paula@glover.net</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1633" id="mailbox_reply_1633" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">4 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">xs</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>rau.jacynthe@mcdermott.info</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>rau.jacynthe@mcdermott.info</span>
                                    </div>
                                    <span>Sit consequatur dolor enim et omnis ipsa ratione.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1341">Reply to <span>rau.jacynthe@mcdermott.info</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1341" id="mailbox_reply_1341" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">4 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">ip</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Prof. Rodrigo Lakin Jr.</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Prof. Rodrigo Lakin Jr.</span>
                                    </div>
                                    <span>Rem ad sed aliquid quia nam ea eum debitis maxime unde omnis ipsum.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1116">Reply to <span>Prof. Rodrigo Lakin Jr.</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1116" id="mailbox_reply_1116" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">3 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_05_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Prof. Lexi Boehm</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Prof. Lexi Boehm</span>
                                    </div>
                                    <span>Odio non modi tempore minus quod magni ut ut qui animi repellat similique qui tempora.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_357">Reply to <span>Prof. Lexi Boehm</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_357" id="mailbox_reply_357" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">3 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_06_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>vhahn@koss.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>vhahn@koss.com</span>
                                    </div>
                                    <span>Qui porro quae quidem placeat eaque similique asperiores officia nemo aut commodi mollitia repellat.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_1599">Reply to <span>vhahn@koss.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_1599" id="mailbox_reply_1599" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">3 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_05_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>emelia.simonis@leffler.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>emelia.simonis@leffler.com</span>
                                    </div>
                                    <span>Aspernatur cumque soluta ipsam et laboriosam id.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2717">Reply to <span>emelia.simonis@leffler.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2717" id="mailbox_reply_2717" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">2 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">ux</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Sunny Lehner</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Sunny Lehner</span>
                                    </div>
                                    <span>Quae quam aut distinctio placeat commodi rerum repellat ut ipsa eius voluptatem.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_500">Reply to <span>Sunny Lehner</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_500" id="mailbox_reply_500" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">2 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">gn</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>wilfredo72@weissnatrunolfsson.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>wilfredo72@weissnatrunolfsson.com</span>
                                    </div>
                                    <span>Fugit quasi veniam dicta quis deserunt est eligendi aut aut magni beatae aut consequatur.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2576">Reply to <span>wilfredo72@weissnatrunolfsson.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2576" id="mailbox_reply_2576" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">1 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">yz</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Marlee Hegmann</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Marlee Hegmann</span>
                                    </div>
                                    <span>Inventore iste tempore asperiores architecto voluptatibus iure sint dolores impedit voluptates et voluptatem et.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_983">Reply to <span>Marlee Hegmann</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_983" id="mailbox_reply_983" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">1 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">sq</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>elindgren@hotmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>elindgren@hotmail.com</span>
                                    </div>
                                    <span>Similique modi labore magni quos repellendus magni autem totam qui et.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_2289">Reply to <span>elindgren@hotmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_2289" id="mailbox_reply_2289" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">1 Jan</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_09_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Prof. Elisabeth Bednar</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Prof. Elisabeth Bednar</span>
                                    </div>
                                    <span>Et eum repellendus ratione pariatur sit unde quis beatae ipsum ex est dolore.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_598">Reply to <span>Prof. Elisabeth Bednar</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_598" id="mailbox_reply_598" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="md-card-list">
                        <div class="md-card-list-header heading_list">Older Messages</div>
                        <ul class="hierarchical_slide">
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">4 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">xq</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>eloise.herman@yahoo.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>eloise.herman@yahoo.com</span>
                                    </div>
                                    <span>Rerum velit eum rem facere eveniet magnam esse eum ratione.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_552">Reply to <span>eloise.herman@yahoo.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_552" id="mailbox_reply_552" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">12 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_10_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>hborer@harber.net</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>hborer@harber.net</span>
                                    </div>
                                    <span>Non sunt distinctio quis id porro et qui corrupti velit ducimus molestiae accusantium.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_492">Reply to <span>hborer@harber.net</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_492" id="mailbox_reply_492" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">30 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">uu</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Ms. Ida Sawayn II</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Ms. Ida Sawayn II</span>
                                    </div>
                                    <span>Et voluptatibus velit tenetur et alias in.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_114">Reply to <span>Ms. Ida Sawayn II</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_114" id="mailbox_reply_114" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">16 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">sz</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>celestino73@schumm.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>celestino73@schumm.com</span>
                                    </div>
                                    <span>Non saepe similique deserunt maiores odit eligendi ipsam sunt asperiores.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_235">Reply to <span>celestino73@schumm.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_235" id="mailbox_reply_235" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">7 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">yd</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Vivienne Schiller</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Vivienne Schiller</span>
                                    </div>
                                    <span>Quibusdam dicta voluptas nam voluptate aliquam dolor aut placeat.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_642">Reply to <span>Vivienne Schiller</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_642" id="mailbox_reply_642" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">1 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">dj</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Laurel Harvey</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Laurel Harvey</span>
                                    </div>
                                    <span>Tempore rerum officiis molestiae a aperiam debitis voluptate quo inventore ut quia a sint.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_69">Reply to <span>Laurel Harvey</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_69" id="mailbox_reply_69" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">24 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">fg</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>torrey.runte@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>torrey.runte@gmail.com</span>
                                    </div>
                                    <span>Eaque voluptatem illo consequuntur aliquid ut eum iste facere.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_570">Reply to <span>torrey.runte@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_570" id="mailbox_reply_570" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">17 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_07_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Jane Volkman</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Jane Volkman</span>
                                    </div>
                                    <span>Optio ullam at qui nobis ullam unde error.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_599">Reply to <span>Jane Volkman</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_599" id="mailbox_reply_599" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">13 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_03_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>dora03@hotmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>dora03@hotmail.com</span>
                                    </div>
                                    <span>Et dolor unde et qui doloribus excepturi veniam sint culpa.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_607">Reply to <span>dora03@hotmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_607" id="mailbox_reply_607" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">8 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">pv</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Brianne Von</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Brianne Von</span>
                                    </div>
                                    <span>Et sequi ratione rerum fugiat quis est.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_922">Reply to <span>Brianne Von</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_922" id="mailbox_reply_922" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">9 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_08_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Madison Sawayn</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Madison Sawayn</span>
                                    </div>
                                    <span>Facere inventore aut ducimus sint laborum esse qui quidem iure deserunt ut quia minus.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_983">Reply to <span>Madison Sawayn</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_983" id="mailbox_reply_983" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">5 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">ab</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Mrs. Reanna Wiegand</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Mrs. Reanna Wiegand</span>
                                    </div>
                                    <span>Sequi rem quis ullam officiis iusto maiores ea nam repellat qui et recusandae.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_708">Reply to <span>Mrs. Reanna Wiegand</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_708" id="mailbox_reply_708" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">25 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_09_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>henriette77@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>henriette77@gmail.com</span>
                                    </div>
                                    <span>Sint aut voluptatum id animi doloremque optio voluptatem inventore consequatur.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_712">Reply to <span>henriette77@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_712" id="mailbox_reply_712" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">22 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">hc</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Landen Bosco</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Landen Bosco</span>
                                    </div>
                                    <span>Eveniet voluptatum in eos et et voluptatem ducimus.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_16">Reply to <span>Landen Bosco</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_16" id="mailbox_reply_16" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">6 Dec</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_05_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Mr. Hailey Corwin</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Mr. Hailey Corwin</span>
                                    </div>
                                    <span>Deserunt ea tenetur cum accusantium voluptate consectetur et delectus quia quos.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_832">Reply to <span>Mr. Hailey Corwin</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_832" id="mailbox_reply_832" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">1 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_08_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>kcorkery@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>kcorkery@gmail.com</span>
                                    </div>
                                    <span>Et non qui quasi iste voluptatem et.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_986">Reply to <span>kcorkery@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_986" id="mailbox_reply_986" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">19 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">dw</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Tremayne Oberbrunner V</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Tremayne Oberbrunner V</span>
                                    </div>
                                    <span>Et debitis nisi harum sint est perferendis ut velit.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_453">Reply to <span>Tremayne Oberbrunner V</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_453" id="mailbox_reply_453" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">30 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_06_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Prof. Rubie Halvorson Jr.</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Prof. Rubie Halvorson Jr.</span>
                                    </div>
                                    <span>Nulla facere aliquam accusantium quae porro explicabo itaque.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_816">Reply to <span>Prof. Rubie Halvorson Jr.</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_816" id="mailbox_reply_816" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">21 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_07_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Prof. Kaya Hettinger</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Prof. Kaya Hettinger</span>
                                    </div>
                                    <span>Et eaque aliquam aliquid cum ut nulla quis dolor veritatis sint dolores reprehenderit.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_529">Reply to <span>Prof. Kaya Hettinger</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_529" id="mailbox_reply_529" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">23 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">ih</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>ervin83@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>ervin83@gmail.com</span>
                                    </div>
                                    <span>Sed numquam quaerat omnis laboriosam et facilis velit quod aut voluptatem impedit eveniet numquam.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_815">Reply to <span>ervin83@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_815" id="mailbox_reply_815" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">27 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">pr</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>bonita.pollich@orn.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>bonita.pollich@orn.com</span>
                                    </div>
                                    <span>Et beatae provident voluptates vel dolore sit sit dolores.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_618">Reply to <span>bonita.pollich@orn.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_618" id="mailbox_reply_618" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">9 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">uq</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Dr. Shanel Dooley</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Dr. Shanel Dooley</span>
                                    </div>
                                    <span>Ipsam aut vero iste unde vero corrupti est sapiente aut voluptatem atque vel.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_261">Reply to <span>Dr. Shanel Dooley</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_261" id="mailbox_reply_261" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">21 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_03_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Margaretta Hand</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Margaretta Hand</span>
                                    </div>
                                    <span>Sapiente nam expedita et aut magni est nemo eveniet voluptas atque consequatur ratione est.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_662">Reply to <span>Margaretta Hand</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_662" id="mailbox_reply_662" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">23 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-cyan">fm</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Gabriella Casper</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Gabriella Casper</span>
                                    </div>
                                    <span>Repellat est et quo tempore esse est aliquam.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_721">Reply to <span>Gabriella Casper</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_721" id="mailbox_reply_721" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">4 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_06_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Harold Steuber PhD</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Harold Steuber PhD</span>
                                    </div>
                                    <span>Alias quis aut sit porro molestiae illo quia.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Delectus eveniet aut debitis maiores ipsam quia eum dolorum eaque blanditiis earum recusandae vel dolores neque consectetur enim incidunt vel sint animi iure nam aliquam debitis iure dolores aliquam sit ut dicta veritatis quasi soluta molestias asperiores enim quam est nam omnis nihil totam at est inventore consequatur molestias quam eius doloremque voluptatibus iste nam et eius est neque ad minus iste qui possimus iste asperiores a et blanditiis repellat.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_419">Reply to <span>Harold Steuber PhD</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_419" id="mailbox_reply_419" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">9 Nov</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-light-green">bu</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>Alta Waelchi</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>Alta Waelchi</span>
                                    </div>
                                    <span>Quasi sed dolorem similique laborum quasi enim quas iste ex cumque eius unde.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        At aut veniam est error voluptatibus cupiditate sapiente nobis dolorem eum accusamus eveniet odit occaecati repellat repellendus voluptas et aut ullam voluptatem aspernatur non repellat rerum iste ut laborum quisquam consequatur quisquam saepe ipsa accusamus aliquid voluptate ut fuga corporis et atque pariatur ipsum impedit id animi qui atque aut non voluptate vero rem et aut et dignissimos sed consequatur perspiciatis a quia voluptatem sint non rerum omnis optio et blanditiis iusto ab fuga commodi dolor dolores dolor quisquam aut incidunt excepturi aliquid qui aspernatur autem doloribus fugiat enim qui ab id ut ut temporibus quas sed veritatis dolorum soluta dolore qui et quidem tenetur aut qui tempore error iusto omnis distinctio atque temporibus non fugit fuga veritatis consequuntur commodi soluta mollitia facilis ut est minus dolorum eos repellat modi nemo similique est aliquid ex inventore et rerum quisquam dignissimos sapiente voluptas similique ea vel reiciendis dicta in omnis nulla facere.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_989">Reply to <span>Alta Waelchi</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_989" id="mailbox_reply_989" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">25 Oct</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <img src="assets/img/avatars/avatar_07_tn.png" class="md-card-list-item-avatar" alt="" />
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>arlo.cassin@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>arlo.cassin@gmail.com</span>
                                    </div>
                                    <span>Ipsum molestiae aut magnam consectetur vel numquam.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Sit sapiente ratione qui doloremque eveniet aut ipsum ea consequatur minima ad omnis ipsa cumque quis facere doloribus consequatur id fugit accusantium laborum sint dolor molestias maiores est fugit quas modi iure vero adipisci et suscipit nihil aperiam est eius deserunt qui pariatur vero voluptas suscipit eaque ea quae cupiditate nisi magni quas sunt id blanditiis laudantium molestiae assumenda numquam culpa dolorem et at deleniti a omnis voluptas repellat aut earum expedita illo officia et excepturi in molestiae molestias id blanditiis ipsa sit unde inventore voluptatem suscipit blanditiis incidunt esse velit voluptas sint magnam culpa quis autem excepturi et at corporis laborum aliquid ullam aperiam.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_516">Reply to <span>arlo.cassin@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_516" id="mailbox_reply_516" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                    <a href="#" class="md-icon material-icons">&#xE5D4;</a>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#"><i class="material-icons">&#xE15E;</i> Reply</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE149;</i> Archive</a></li>
                                            <li><a href="#"><i class="material-icons">&#xE872;</i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="md-card-list-item-date">18 Sep</span>
                                <div class="md-card-list-item-select">
                                    <input type="checkbox" data-md-icheck />
                                </div>
                                <div class="md-card-list-item-avatar-wrapper">
                                    <span class="md-card-list-item-avatar md-bg-grey">es</span>
                                </div>
                                <div class="md-card-list-item-sender">
                                    <span>miller.raleigh@gmail.com</span>
                                </div>
                                <div class="md-card-list-item-subject">
                                    <div class="md-card-list-item-sender-small">
                                        <span>miller.raleigh@gmail.com</span>
                                    </div>
                                    <span>Rerum ab ratione quis ex sed voluptatem et sunt fugiat et totam minus.</span>
                                </div>
                                <div class="md-card-list-item-content-wrapper">
                                    <div class="md-card-list-item-content">
                                        Aut aut omnis consequatur beatae et unde iste nemo corporis et eum dolorem voluptatum et id et dignissimos id non minima sunt eum et tenetur voluptatem assumenda ut vel placeat magni nam mollitia voluptates est eius culpa consequuntur commodi perspiciatis ducimus magni est repellendus nihil qui asperiores voluptatibus sed voluptas tenetur architecto id magni et enim adipisci minima omnis vero ut labore architecto perspiciatis qui eaque eum cumque voluptates quaerat et et deserunt itaque quae nihil voluptas nulla dolorum qui consequatur vitae nobis nam qui repellat similique quaerat dolores ab harum deleniti aut et a fugiat nihil odit fugiat quia quia et architecto tempore voluptatem quos saepe quae ea omnis temporibus modi qui autem dolore cupiditate ea delectus autem corrupti dolores et et voluptatum ullam autem qui qui id officiis et dolor cumque adipisci sit velit nemo aperiam nulla voluptas adipisci voluptatem animi repellat perferendis dolores explicabo officia aspernatur eum recusandae quos aut molestiae ea non eaque aut iste architecto eaque porro voluptas voluptas assumenda aut enim qui ullam qui saepe ad dignissimos reprehenderit ut aperiam aspernatur nesciunt earum optio tenetur aut aut ut voluptatem aperiam pariatur ab quisquam est aut officiis unde ullam est aliquam voluptatem dolor suscipit tenetur aut rerum tempora aperiam consequatur tenetur saepe eligendi eveniet molestias quisquam voluptate praesentium possimus maxime ex non in assumenda reiciendis est veritatis nesciunt cupiditate officiis ut iste consequatur nisi aut quidem in pariatur tenetur facere rerum consectetur facere ullam voluptatibus fuga qui ut tenetur ut eum error laboriosam facere ipsam in voluptatem dignissimos consequatur rerum voluptas et et atque fugit itaque minima quisquam cumque tempora aut aut consequatur sint est et dolor numquam nihil molestiae tenetur rerum eligendi eos ut aut fugiat laboriosam impedit sit atque quod dignissimos et officiis aperiam quibusdam qui amet est ipsum a voluptas molestiae reprehenderit qui et rem id molestiae mollitia voluptatem ad numquam distinctio cupiditate excepturi id et dolore repudiandae voluptas cum esse placeat exercitationem voluptatibus quasi dolores fugiat id quod inventore eligendi fugiat voluptatibus velit consequatur soluta provident unde inventore ut rem commodi exercitationem consequatur sed accusantium enim ut iusto officia et in possimus facere quaerat non facere ab amet nesciunt qui rem nihil iure velit atque alias cupiditate ipsum blanditiis quia nihil est quo accusantium alias dicta et eum occaecati facilis iusto et hic doloremque atque consequatur voluptas ullam perferendis corporis ut et sunt ut expedita perspiciatis molestiae qui velit atque id sapiente quam et nisi accusamus est sit aperiam nostrum magnam cumque cumque quod aliquam voluptas laudantium amet soluta ipsa repellendus qui rerum nulla aut minus nostrum nostrum harum dolorem libero tempora sequi est et sunt non accusamus sed nam esse ea vitae eaque natus sit omnis enim id tempora illum autem culpa suscipit possimus cupiditate id vel aliquam harum ut praesentium id esse non delectus voluptates quia nam accusamus hic consectetur aperiam est cumque ut rem atque dolorem aliquam soluta consequatur fugit odio eius laborum et est dolores aliquam mollitia deserunt ea et veritatis inventore sunt eos impedit voluptatem amet itaque rem soluta eos aut eum eos aut eveniet earum atque molestias ut fugit enim aut.                                    </div>
                                    <form class="md-card-list-item-reply">
                                        <label for="mailbox_reply_660">Reply to <span>miller.raleigh@gmail.com</span></label>
                                        <textarea class="md-input md-input-full" name="mailbox_reply_660" id="mailbox_reply_660" cols="30" rows="4"></textarea>
                                        <button class="md-btn md-btn-flat md-btn-flat-primary">Send</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent md-fab-wave" href="#mailbox_new_message" data-uk-modal="{center:true}">
            <i class="material-icons">&#xE150;</i>
        </a>
    </div>

    <div class="uk-modal" id="mailbox_new_message">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close uk-close" type="button"></button>
            <form>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Compose Message</h3>
                </div>
                <div class="uk-margin-medium-bottom">
                    <label for="mail_new_to">To</label>
                    <input type="text" class="md-input" id="mail_new_to"/>
                </div>
                <div class="uk-margin-large-bottom">
                    <label for="mail_new_message">Message</label>
                    <textarea name="mail_new_message" id="mail_new_message" cols="30" rows="6" class="md-input"></textarea>
                </div>
                <div id="mail_upload-drop" class="uk-file-upload">
                    <p class="uk-text">Drop file to upload</p>
                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                    <a class="uk-form-file md-btn">choose file<input id="mail_upload-select" type="file"></a>
                </div>
                <div id="mail_progressbar" class="uk-progress uk-hidden">
                    <div class="uk-progress-bar" style="width:0">0%</div>
                </div>
                <div class="uk-modal-footer">
                    <a href="#" class="md-icon-btn"><i class="md-icon material-icons">&#xE226;</i></a>
                    <button type="button" class="uk-float-right md-btn md-btn-flat md-btn-flat-primary">Send</button>
                </div>
            </form>
        </div>
    </div>

@stop

@section('scripts')
    <script src="assets/js/pages/page_mailbox.min.js"></script>
@stop

