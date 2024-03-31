<template>
    <div>
        <div class="container-scroller">
            <Nav :user="user"></Nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <side></side>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="home-tab">
                                    <div
                                        class="d-sm-flex align-items-center justify-content-between border-bottom"
                                    >
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link active ps-0"
                                                    id="home-tab"
                                                    data-bs-toggle="tab"
                                                    href="#overview"
                                                    role="tab"
                                                    aria-controls="overview"
                                                    aria-selected="true"
                                                    >Overview</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    id="profile-tab"
                                                    data-bs-toggle="tab"
                                                    href="#audiences"
                                                    role="tab"
                                                    aria-selected="false"
                                                    >Audiences</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    id="contact-tab"
                                                    data-bs-toggle="tab"
                                                    href="#demographics"
                                                    role="tab"
                                                    aria-selected="false"
                                                    >Demographics</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link border-0"
                                                    id="more-tab"
                                                    data-bs-toggle="tab"
                                                    href="#more"
                                                    role="tab"
                                                    aria-selected="false"
                                                    >More</a
                                                >
                                            </li>
                                        </ul>
                                        <div>
                                            <div class="btn-wrapper">
                                                <a
                                                    href="#"
                                                    class="btn btn-otline-dark align-items-center"
                                                    ><i class="icon-share"></i>
                                                    Share</a
                                                >
                                                <a
                                                    href="#"
                                                    class="btn btn-otline-dark"
                                                    ><i
                                                        class="icon-printer"
                                                    ></i>
                                                    Print</a
                                                >
                                                <a
                                                    href="#"
                                                    class="btn btn-primary text-white me-0"
                                                    ><i
                                                        class="icon-download"
                                                    ></i>
                                                    Export</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content tab-content-basic">
                                        <div
                                            class="tab-pane fade show active"
                                            id="overview"
                                            role="tabpanel"
                                            aria-labelledby="overview"
                                        >
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div
                                                        class="statistics-details d-flex align-items-center justify-content-between"
                                                    >
                                                        <div>
                                                            <p
                                                                class="statistics-title"
                                                            >
                                                                Games Income
                                                            </p>
                                                            <h3
                                                                class="rate-percentage"
                                                            >
                                                                {{
                                                                    income[0]
                                                                        .game_income
                                                                }}
                                                                $
                                                            </h3>
                                                        </div>
                                                        <div>
                                                            <p
                                                                class="statistics-title"
                                                            >
                                                                Item Income
                                                            </p>
                                                            <h3
                                                                class="rate-percentage"
                                                            >
                                                                {{
                                                                    income[0]
                                                                        .item_income
                                                                }}
                                                                $
                                                            </h3>
                                                        </div>
                                                        <div>
                                                            <p
                                                                class="statistics-title"
                                                            >
                                                                Registered Users
                                                            </p>
                                                            <h3
                                                                class="rate-percentage"
                                                            >
                                                                {{
                                                                    income[0]
                                                                        .users
                                                                }}
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="d-none d-md-block"
                                                        >
                                                            <p
                                                                class="statistics-title"
                                                            >
                                                                Total Games
                                                            </p>
                                                            <h3
                                                                class="rate-percentage"
                                                            >
                                                                {{
                                                                    income[0]
                                                                        .games
                                                                }}
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="d-none d-md-block"
                                                        >
                                                            <p
                                                                class="statistics-title"
                                                            >
                                                                Total Collection
                                                            </p>
                                                            <h3
                                                                class="rate-percentage"
                                                            >
                                                                {{
                                                                    income[0]
                                                                        .collections
                                                                }}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-lg-12 d-flex flex-column"
                                                >
                                                    <div
                                                        class="row flex-grow"
                                                    ></div>
                                                    <div class="row flex-grow">
                                                        <div
                                                            class="col-12 grid-margin stretch-card"
                                                        >
                                                            <div
                                                                class="card card-rounded"
                                                            >
                                                                <div
                                                                    class="card-body"
                                                                >
                                                                    <div
                                                                        class="d-sm-flex justify-content-between align-items-start"
                                                                    >
                                                                        <div>
                                                                            <h4
                                                                                class="card-title card-title-dash"
                                                                            >
                                                                                Recent
                                                                                Customers
                                                                            </h4>
                                                                            <p
                                                                                class="card-subtitle card-subtitle-dash"
                                                                            ></p>
                                                                        </div>
                                                                        <div></div>
                                                                    </div>
                                                                    <div
                                                                        class="table-responsive mt-1"
                                                                    >
                                                                        <table
                                                                            class="table select-table"
                                                                        >
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        <div
                                                                                            class="form-check form-check-flat mt-0"
                                                                                        >
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                            >
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check-input"
                                                                                                    aria-checked="false" /><i
                                                                                                    class="input-helper"
                                                                                                ></i
                                                                                            ></label>
                                                                                        </div>
                                                                                    </th>
                                                                                    <th>
                                                                                        Customer
                                                                                    </th>
                                                                                    <th>
                                                                                        Email
                                                                                    </th>
                                                                                    <th>
                                                                                        Role
                                                                                    </th>
                                                                                    <th>
                                                                                        Status
                                                                                    </th>
                                                                                    <th>
                                                                                        Date
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr
                                                                                    v-for="(
                                                                                        user,
                                                                                        index
                                                                                    ) in users.data"
                                                                                    :key="
                                                                                        index
                                                                                    "
                                                                                >
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-check form-check-flat mt-0"
                                                                                        >
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                            >
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check-input"
                                                                                                    aria-checked="false" /><i
                                                                                                    class="input-helper"
                                                                                                ></i
                                                                                            ></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="d-flex"
                                                                                        >
                                                                                            <img
                                                                                                v-if="
                                                                                                    user.image
                                                                                                "
                                                                                                :src="
                                                                                                    'http://127.0.0.1:8000/storage/user_images/' +
                                                                                                    user.image
                                                                                                "
                                                                                                alt=""
                                                                                            />
                                                                                            <img
                                                                                                v-if="
                                                                                                    user.avatar
                                                                                                "
                                                                                                :src="
                                                                                                    user.avatar
                                                                                                "
                                                                                                alt=""
                                                                                            />
                                                                                            <img
                                                                                                v-if="
                                                                                                    user.avatar ===
                                                                                                        null &&
                                                                                                    user.image ===
                                                                                                        null
                                                                                                "
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABRFBMVEWSh4Hl5ef3wHBTU1HAeCY2Ky/4jwC5u7ro6Or4jQDl5ebq6uyNgnuQhH6NgXrm5egxJSq/wcC+bwDk5+1jX2Di2tVISEX9xHH5igDJxsVHTE/i4eNMTEr3v271w3v3w3W/dR0rHSLU0tKbko2ZmZmvqaXxy5ann5yEhIOrq6vtunBMT1DZ2Nj3qET4vWglFRvLmmpPR0qqqqtxcXC6tLLCnWhxaFj3sVTp3c33miL4oziinqHv0q7Zw7C1vL8+NDjRq4iJiYl4eHdoaGePe17Wq2yykmV9b1lmYFbhsW5XWFKcg2CrjmOKeFyvp5noolHOgSTVfxNoXEucbTurdDfakUGDZUXVmVrnihPgjSjNv7GQakI6SVH0tW7RqoLmp2njsH3uz6fzyIzEiktoSzptQx/DgDfWuqHMnHDDva/t17/2q0PRqd1PAAASS0lEQVR4nO2d6VfbxhqHLRYxWsdGNlgWxOClhtjBAUzYSgkkpNna26TLTXu7pdyG3uT//37f0WJLtizNIhtyjn89pyehVJ7H7zqj0SiXm2mmmWaaaaaZZppppplm+kxkGIZugnQj+Kvp/lU3jFsembCATNdz9VavZ9dqjiOpEsIIqarqOE6nZvd6rXru8wU1TCNXb9o1B2kaAmFpSOSHmiZ1aoVmPaebnxcl0AFcBwPaMNeoCKfasZt1+L8+D0zdzAEd0katliAMv+8ApWne9vDTZJj1Xk3VKEw3Ckn8tlNo3WVLGmC9GpVnjhfSnELd1G8bJVaG3rIljcU146VirdPL3b3Mo+d6HS7njBWS7PrdYjRzPVXLCo9IRajWujuMZs5WkZolIBHSOs27wQj+KZZcxgsY9VtPOobRc5gqHytjS79dO5qtTqbxF8NYq9+iGfV6bYL284QxsnO3ZEZDn1gARoWk5q00c3rLmbCDDgSuOnUzGoY9NT4QUntTrhx6qzMVBx1oymY0pxSBYSGnObWkauRq0/TQvrTClBKO2cJTN6CP2JlK3QAPvR0+iXjqFMq/OdUcOiyMJh6MRu32LOhK6000GI3ctIvEsLCk2RNENOoOOyAmy4UgJCGE3T/GLJ6yaIKIRl3FjBNdd823sNe43C/Or8E/xSeXF3tLNQkw+afMqDahjKrXwUckhq8faap9ellcWVlbW5vva21tZaW4td3R+DMWsieCqNfZvnVNsxvFlTBbSGsra/t7/J07sieQUcGCLEPQnNMnK/F0gVbWGtyME4hFSDL0/om02lYKnm/JhsSXm3HmiEaOPosirbBPw+fascjbQGRdF3XqOujy0eF5jHu8iJl2NyZtJ4M0m4mPIG5xNhGolR2iWaD8nrXOJa1/hhAv+QglKbM5sdmkA9ScBjsfaO2Sy4qq5GQEaNSpBoDQ9jwPn4vo93WMwrWMsg1VndDsJ4wBGEbcv9xqbNcQK6RWyCIUabKMqnW2+PlcRreZa9QYGVFTPBTNHsVdT22P10GHOFcuGZeAnLoooNGi+MROUcyAEcYGkxVRTdhPHZqPKWYFOE+KB9MkVOuJIZo2zaehQmY2nCdph2kSg4SqokFbCS8zCcMAcYslFnFHyIg0Pkq+RztLI86vbLMgIoEenM5HibStLI04v8a04MXvp1R51P+QTraETH7Kn08Nhkmv1sgUcYVpWZZ3IgW1nuFTnCwB59cumAo/bwvOtKqpbWeabF5S5jj/w5d4jKhTpxlPiMtN25VKG/7Vbg/9fGWJ6dM1nuaNbs40AByq+jD0yujAh/Hmnx68uH///tWzR5Xor641mNwUcSxMsZpQuwjbsPLy6cHV1dWzrwFirCrPn91fnVufm5tbXV198SrKuM/WgWvsFYPRhBIK2+blAQzaHfn9g68rlThLtiuP4JfmBlp98SjybbCsrksquxHpi70PWBs4aeVpaOgACS44BAku/PRqNczn/uqrEOIKU6ohZZ/VhIxrfKEwrLweGjqx5KvnbTcuQZXKy2+i5uv/4usBIltFZI9EVhPCHHhtHGBAeXXw+tXTp69eH1zNjZhv1IorrCOQ2IzIGoWDnqb99ZjRk3Tiacx/B62vPgrceaXAmgiYdmrorJcfEFZejAdI1+qLCq8NscRkQ8YwHxSL9jcJJqJBfNrm9VKtR18wdKaONEJYORAjXA+MyOylEnbo3VTvMN9o79vwvhAgGPE5rw0lrUVrRIZ54eDqfhy+FASEdNrmqhZMVZ+1YQsRth+JOSkQHlQ4CSWsUnspM1+/HooTzl1VuHoadxCUuYZ2gS0i5E0Px1dDWvVTDcduFJVyOcOscWzo8bs2ccK5+x5hkeeOG21zynPb2e+8syNknD35o6ByU4Nvd6Xj5VLxOPS8lG21rS+qG4rU9+yj0uazIVz1Mg3jHD8QnZvyXLm/sJ9VLl1hb6tcQgo3NZpcJsTat26lfp5RPVwrSBbP3j4KN+Up9xJGH//1XSVLwrdvfrzh2epJMcEwOuyAkvpCUeS3biCuixK+Jr7Q/l5Wyj9ybNel6E3r7NtbsfVbWZblH8iX366KErp9aftnuKDyo8VMiJfSCHkaGusjAVTeZTO3IBPE9luZqHzDjthJC0SeMPRMKMs/tUWn+ITwazLL/MG9oPJvi729SmvcOKaGknqiuANayITwEXGFdx7hz0yLpkQ4fX2fI5OWjj1CGSavlStRwpfgpD9515N/dlgrBk6riDyTX9wn/L4tvIoxVyVO+l2fkHk0aRukeZpSrJ74A3oDhM8ECe+Dqz+X+4TsMZOSangSDQ7iUJbfttux68EMgsa7/X1wve84CFMm+nqHObYhlz4IRvRDpf1KcK0N2tL2m8CGHAUxtflmvyKpFgHhu/n2U8H10oNKP8+QasE+Gi1xM5/BekPGI/yiHIzpp4rgivDcQaXyoU/4mCOzJydTvcUzsfB6Gq8k/io4yV99Vnn5Lrha+Ree9ZTENUXO+X1JDtxUfik4uQDC/wTXkt/xrBglbxzmmjpJqtVPpvL386KEv37XJ+RJNFAukgqizreCYd3ru+kb0Xr44m0fUHnMQ4gTN9eYfA9QWl8GNlRk4VWMw74/KDbXg4o4qVyYHAvN5Jpq0Lcpx6LzwxAhT0cjpWzLMDgfewzmT5kS8jlp2jSf8/lV66PijUs5ESbcCdzhHcdEjihx/z5XwZdCrWmGhOXf+UwIJT8hmfIS9tsa5UFWhNwmlFDCNj6YHXJeNcg1yqEoYEBY5ozC5KaGn1Cy3peVbAjX/X6G14SJc2DO9W4iPxIzIJzzTMixzNYnTLBhk//cQ0inhHAnA0K4UPkPbsCJEWJINopcFiesQkSXf8T8xy5MipCE4nFZETdh9bhc/pPfgmlxKHQ6p1X68v1fovctINW8PxIBTCbkz6WusGV9KeymO+85FrqjhInVQujaoCNxwo8CMZhGyN/TBMIlccKS4BgSF2rECVXROFyvCg4hZSlK+AQh654g4vpfQmlGSplbmMInyVpfCBJCopkoId8cP0z4XjAQdz6KEibOgPWaMOFHUcKS6Imoicv6fKuJEQmXC+FASVxr08XP0xNMppBoVEEjOon3LcQJBZPpuniiSd40JN7UCCbTnSPRAaTcBBYu+ZJgZ7oj6qPJC1Hk0V9RQiyUatbviTppyv3DnClcLqBvE3DT9S+ECVPuAWdQLiyRKSJMLEQ/HycCiqxF9SXipn8JzpyklJtrvLe5I8LqJ17E6ifhhobiwEHhVAMVUeZDrB6WReeG5JDalM2JnLu8o4SHMk8oVg8VccL059bF+zZs3aseH7MjAmAWhFLq/tIMupp7c+vyMQ+grAjXe5oDzsQnwdCZHpYZb5VWd8hStzChmtLReIEoTggDPmFD9ABlRTjPUZw8oLMdSDGGEPxUYXBUAPQk7KVO+rNdBte2qBFCElbUiG4MurcfRQmpHrLURT3FmyFWT6gRq4f+nipFmDCl7fYJRVvTYA5MdtdQFY3AgrJcFu1pUDpfTngWrAZz4EPI/hTdTXWwgUaYkPLEKF2wXgSE4KcEMSWlVh8MAOWy4EfTPX/IfibGGEKST8l97yTE6txJCFBWRHsaumdIRduawUqNG2DKydxYxurhcRhQ1EtV2hNbBbPpgNDzU0V+sB7HWJ0DvgigLNiXUmVSl5Dv6cZRQn9fhQJ148HhThXks8Efdg5P5CE+YUL65/HrkkjEhwkH2/CA5vjkwSHRpwcnx+4PRiRGyHDavtgkMUxYDScSpS85hk6ckOFIM64zBwaE4aWo9XiUMRIixKkP5oURhXJNKK2sh+s5BeGRgPOwnE/DP9NXJexcR1q16jEL4n/535WFVaYT23g3C0uo9GEjWhR2WAj/3izwbnihmPtmYUQCuBBtt6ufGBD/zm8ynT8bUuIG9qyMqGICuLAzhMjgp3/nF7unXFZkPnSPy4hWaQMAN47+is4oqP1Ukf+bX1zssp1d6gmrzAcnsqdTrB0B38LCsmN9GTFjpCgm8JUf/G8eCBe7l+yIiP2EfZ25JlpnLuDCckm1jqoRTx1X4SOAyp9fFYqEcLH7hPX1Myp9wxYyItvzM9i68QCBEEuWGvbU6mE5FbB8/MtXSz7h4maR8S1CXCezU0+isISRpZ49XF4ICF3g8MaaVD9Vyn8sfbXUJ1zc3O1JGsPDHwxHtYVE2Z1ihNSzfzaWfQv6hMB9NDfw1JTmTZEfA1+IcDHfXdyyqV/qQX9SW1QUR2S41gvj9QnBiuCp61R+Wj75nwsYIiR27J5fEMh0S/KcsesZMaVixOENCFWMQ7sWkoqi8tDjGyJ0IXcbdvqbS1iL/UD6+JNcyPgh9haG8QaExFFDOXVsUVTefBsAjhCCtwLkRQqkwAsgxq5/e6klDi9MSH6xn1Mja2phwOteHzCGkAIyZYtQsuKX3SwLnz0ccc5YQnd/jW/GOD9V5N8HfGMIPcjzrcIYSMEXXIx0NlhTk/BGCAeeeji6bqEcn4UBxxJ6Mbl42XNG35oo+AK2IT9FlpOCN0oIMfvFTmxRVJTfliKAiYQuZH6fQIbGpAq/82nw+gBMhRdDCAnno7uLaKgoBkWQnpD4azf/ZK+j9acfqvjLgoK6j8enljQbkkkHSTjRogh99jAgBaEHWdzr+LM7xFnrw6q7b1fF6CEV3oLXl45ELzRx6+GiqMh/DuPRErqQRc0Pwgxe2gWhSEaMS3R8MD+8LsXkPEg4O3PrwTO+5aEUExDuUhKeexkwo/eReqGIrbPldDoPceNsdKOvapGE4628KeXfCjGAhW1qQC90UCej1wP6VdG6oUVcWL6JsSK2PnpFcagI9gEbi9SAno/yd2vD8g+TsB7TIz6Mu18NvTgYMS7FEMDLTSo+KP8+YBZZJpA7G8YsiBsfSjE7RcGMn6AIxqpICbjY9V7OirN9EanhsFrRDcYYM5biU8z2OZ2HLubzdpBGM32ZrOG/5pEBcWE59oQgXIgDvNikBVycDGD/jceYCfEfdZQRxRAW9ruUHhokGZw5oPdidcaMGhuMo4RQJGhDcPMcEoI6CQt6iNhLFme0zY0XjGmEhVPKIgGA8/6hrRMBJIjerWHraIEa0Q1GnERY2KL1ULJS7AGi5kQA3Vj0Mqp7d4IW8Tp6WG6UsEBfJBa7wfHQEwMkGdVbJUbqP9zBGCEs7NEWCagS/itfkdqaGCBB9NsJ62yDKRjVWMLCRZ46BHc75JNVCTn1LAv9qHTb/SYxKl0zeOrvg0XPMCG1h+a7F8gPwU4uu1YtXsH7gVX0mD6nLl8TT8URQqYiUdBcL1C1bKZLKYgtL3VA2aBPOBsLR1rUhvQemu9e+vdp8ARzTFh63Q0JsCIkHHoz3mgRQmoP3TxfCr4cpzUFC7oyCv53ymLG5X/cZ5pcQmi0aadK3QvJB9TsiYfgQMRT3dUbS6KPxo0Pjk9YaFA22vluMdh+gqbkoYGMnO3FPrZK1K66QQ63cgkpVyu6571gbVSrTbhIjMps+gkHWhzqZTjNI9ymAcxvnp+iwIBSFmtqrAIzejUKI+vsmm4l9QwTQqr1is3zhhosRt+CAT2ZrU7wHdMxbjy0XBvuptqve34a3MnHyGnq00sxURlmM9g0gdAvFIzLJQyEpykmzHd394IEChfuGbfFR6QbSzhghJyT1qxCrkGFwpOkMMxvbu7bwR0mFSE7N9UUGiMzZ2PkpVXVcm6uNxIpP6hgw/MEvO7uacfPn9Blo1r9tvmI9LqfcsicA5VuwFvHQi6fIbsxxknz7l17MB8O/NOu31oADsms21I/LwDk47GQkGtinRToNountcFdXnyX+Ij0XE/tjw4hsCS50xiHaRdi6Lq7W+6dz8EcSyrUzTvER6TrzRpCbuuJSRtgWaWbx9cLLmcIdOPbfibNQ1LpdvO7+41C9L4uRp2mfhfib1iGWe91+hFJ8qBl4dLZzeOH1x82NpZ9XRe7RJv5893iZaNnA1xkAwLSHLtu3k6Bp5Cu1wuQCgcjxuQcPgupTqlU+uXM1fZ2b8mu1RxgGYLDmOC1cncp/EZlAGSvphJINTx2GD24sEVwXY3emYIf1np1465FX6wMPddaqqlhWyaLIHfsJrjA54DnydBNo9WzO+CKxF6xm++wx6Yhp1Zo5czPiC4QOCwYswlB58YcigpiUHI6NbvXAs/8DOn6MsCaEFr1VrPZ69mBCr1ms1Unlv6s4SIyiAAIRLB041YnDDPNNNNMM80000wz3TH9HypXlKJ8SaftAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                            />
                                                                                            <div>
                                                                                                <h6>
                                                                                                    {{
                                                                                                        user.user_name
                                                                                                    }}
                                                                                                </h6>
                                                                                                <p>
                                                                                                    Head
                                                                                                    admin
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td
                                                                                        v-if="
                                                                                            user.email
                                                                                        "
                                                                                    >
                                                                                        {{
                                                                                            user.email
                                                                                        }}
                                                                                    </td>
                                                                                    <td
                                                                                        v-if="
                                                                                            user.second_email
                                                                                        "
                                                                                    >
                                                                                        {{
                                                                                            user.second_email
                                                                                        }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <h6>
                                                                                            {{
                                                                                                user.role
                                                                                            }}
                                                                                        </h6>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span
                                                                                            class="bg-success p-2 border-radius-4 text-light"
                                                                                        >
                                                                                            {{
                                                                                                user.status
                                                                                            }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="badge p-3 badge-opacity-warning"
                                                                                        >
                                                                                            {{
                                                                                                user.date
                                                                                            }}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center my-5"
                                                    >
                                                        <Component
                                                            preserve-scroll
                                                            class="p-3 btn-secondary mx-1"
                                                            :is="
                                                                link.url
                                                                    ? 'Link'
                                                                    : 'span'
                                                            "
                                                            :href="link.url"
                                                            v-html="link.label"
                                                            v-for="(
                                                                link, index
                                                            ) in users.links"
                                                            :key="index"
                                                        >
                                                        </Component>
                                                    </div>
                                                    <div class="row flex-grow">
                                                        <div
                                                            class="col-md-6 col-lg-6 grid-margin stretch-card"
                                                        >
                                                            <div
                                                                class="card card-rounded"
                                                            >
                                                                <div
                                                                    class="card-body card-rounded"
                                                                >
                                                                    <h4
                                                                        class="card-title card-title-dash"
                                                                    >
                                                                        Recent
                                                                        Events
                                                                    </h4>
                                                                    <div
                                                                        class="list align-items-center border-bottom py-2"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-2 font-weight-medium"
                                                                            >
                                                                                Change
                                                                                in
                                                                                Directors
                                                                            </p>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center"
                                                                            >
                                                                                <div
                                                                                    class="d-flex align-items-center"
                                                                                >
                                                                                    <i
                                                                                        class="mdi mdi-calendar text-muted me-1"
                                                                                    ></i>
                                                                                    <p
                                                                                        class="mb-0 text-small text-muted"
                                                                                    >
                                                                                        Mar
                                                                                        14,
                                                                                        2019
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="list align-items-center border-bottom py-2"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-2 font-weight-medium"
                                                                            >
                                                                                Other
                                                                                Events
                                                                            </p>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center"
                                                                            >
                                                                                <div
                                                                                    class="d-flex align-items-center"
                                                                                >
                                                                                    <i
                                                                                        class="mdi mdi-calendar text-muted me-1"
                                                                                    ></i>
                                                                                    <p
                                                                                        class="mb-0 text-small text-muted"
                                                                                    >
                                                                                        Mar
                                                                                        14,
                                                                                        2019
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="list align-items-center border-bottom py-2"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-2 font-weight-medium"
                                                                            >
                                                                                Quarterly
                                                                                Report
                                                                            </p>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center"
                                                                            >
                                                                                <div
                                                                                    class="d-flex align-items-center"
                                                                                >
                                                                                    <i
                                                                                        class="mdi mdi-calendar text-muted me-1"
                                                                                    ></i>
                                                                                    <p
                                                                                        class="mb-0 text-small text-muted"
                                                                                    >
                                                                                        Mar
                                                                                        14,
                                                                                        2019
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="list align-items-center border-bottom py-2"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-2 font-weight-medium"
                                                                            >
                                                                                Change
                                                                                in
                                                                                Directors
                                                                            </p>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center"
                                                                            >
                                                                                <div
                                                                                    class="d-flex align-items-center"
                                                                                >
                                                                                    <i
                                                                                        class="mdi mdi-calendar text-muted me-1"
                                                                                    ></i>
                                                                                    <p
                                                                                        class="mb-0 text-small text-muted"
                                                                                    >
                                                                                        Mar
                                                                                        14,
                                                                                        2019
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="list align-items-center pt-3"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-0"
                                                                            >
                                                                                <a
                                                                                    href="#"
                                                                                    class="fw-bold text-primary"
                                                                                    >Show
                                                                                    all
                                                                                    <i
                                                                                        class="mdi mdi-arrow-right ms-2"
                                                                                    ></i
                                                                                ></a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-6 col-lg-6 grid-margin stretch-card"
                                                        >
                                                            <div
                                                                class="card card-rounded"
                                                            >
                                                                <div
                                                                    class="card-body"
                                                                >
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between mb-3"
                                                                    >
                                                                        <h4
                                                                            class="card-title card-title-dash"
                                                                        >
                                                                            Activities
                                                                        </h4>
                                                                        <p
                                                                            class="mb-0"
                                                                        >
                                                                            20
                                                                            finished,
                                                                            5
                                                                            remaining
                                                                        </p>
                                                                    </div>
                                                                    <ul
                                                                        class="bullet-line-list"
                                                                    >
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Ben
                                                                                        Tossell</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    Just
                                                                                    now
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Oliver
                                                                                        Noah</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Jack
                                                                                        William</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Leo
                                                                                        Lucas</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Thomas
                                                                                        Henry</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Ben
                                                                                        Tossell</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="d-flex justify-content-between"
                                                                            >
                                                                                <div>
                                                                                    <span
                                                                                        class="text-light-green"
                                                                                        >Ben
                                                                                        Tossell</span
                                                                                    >
                                                                                    assign
                                                                                    you
                                                                                    a
                                                                                    task
                                                                                </div>
                                                                                <p>
                                                                                    1h
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div
                                                                        class="list align-items-center pt-3"
                                                                    >
                                                                        <div
                                                                            class="wrapper w-100"
                                                                        >
                                                                            <p
                                                                                class="mb-0"
                                                                            >
                                                                                <a
                                                                                    href="#"
                                                                                    class="fw-bold text-primary"
                                                                                    >Show
                                                                                    all
                                                                                    <i
                                                                                        class="mdi mdi-arrow-right ms-2"
                                                                                    ></i
                                                                                ></a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div
                            class="d-sm-flex justify-content-center justify-content-sm-between"
                        >
                            <span
                                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                                >Premium
                                <a
                                    href="https://www.bootstrapdash.com/"
                                    target="_blank"
                                    >Bootstrap admin template</a
                                >
                                from BootstrapDash.</span
                            >
                            <span
                                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                                >Copyright © 2021. All rights reserved.</span
                            >
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>
</template>

<script>
import side from "./body/side.vue";
import Nav from "./Navbar/Nav.vue";
import JSAlert from "js-alert";

export default {
    components: { Nav, side },
    props: { user: Object, income: Array, users: Object },
    setup() {
        Pusher.logToConsole = true;

        var pusher = new Pusher("4558ef6f532d8d6a0d86", {
            cluster: "ap1",
        });

        var channel = pusher.subscribe("steam-channel");
        channel.bind("steam-event", function (data) {
            JSAlert.alert(
                "A new user :" +
                    JSON.stringify(data.name) +
                    "has joined our website."
            );
        });

        // const app = new Vue({
        //     el: "#app",
        //     data: {
        //         messages: [],
        //     },
        // });
    },
};
</script>

<style></style>
