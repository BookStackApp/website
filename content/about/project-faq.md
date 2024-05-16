---
title: "The BookStack Project FAQ"
layout: "single"
type: "about"
---

Below are many of the common questions we get asked in relation to the wider organisation 
and governance of the BookStack project.


<ul id="toc" class="dual-column-dual-level-toc">
<li><a href="#origins-goals--organisation" class="toc-header-h2">Origins, Goals &amp; Organisation</a>
    <ul>
    <li><a href="#how-did-bookstack-start" class="toc-header-h3">How did BookStack start?</a></li>
    <li><a href="#what-are-the-core-goals-of-bookstack" class="toc-header-h3">What are the core goals of BookStack?</a></li>
    <li><a href="#who-works-on-bookstack" class="toc-header-h3">Who works on BookStack?</a></li>
    <li><a href="#how-is-work-for-the-project-organised" class="toc-header-h3">How is work for the project organised?</a></li>
    <li><a href="#what-versions-of-bookstack-do-you-support" class="toc-header-h3">What versions of BookStack do you support?</a></li>
    <li><a href="#what-license-is-the-project-provided-under" class="toc-header-h3">What license is the project provided under?</a></li>
    </ul>
</li>
<li><a href="#feature-development" class="toc-header-h2">Feature Development</a>
    <ul>
    <li><a href="#how-are-features--additions-decided-upon" class="toc-header-h3">How are features &amp; additions decided upon?</a></li>
    <li><a href="#is-feature-x-planned-to-be-added" class="toc-header-h3">Is feature X planned to be added?</a></li>
    <li><a href="#but-feature-x-would-be-really-simple-to-implement-why-not-just-build-it" class="toc-header-h3">But feature X would be really simple to implement, why not just build it?</a></li>
    <li><a href="#if-a-feature-is-not-wanted-why-not-just-add-it-as-an-option" class="toc-header-h3">If a feature is not wanted, why not just add it as an option?</a></li>
    <li><a href="#would-bookstack-integrate-with-x-platform" class="toc-header-h3">Would BookStack integrate with X platform?</a></li>
    <li><a href="#can-we-pay-for-the-implementation-of-specific-features" class="toc-header-h3">Can we pay for the implementation of specific features?</a></li>
    <li><a href="#can-we-get-our-own-or-pay-other-developers-to-contribute-the-features-we-want" class="toc-header-h3">Can we get our own, or pay other, developers to contribute the features we want?</a></li>
    </ul>
</li>
<li><a href="#funding--partnerships" class="toc-header-h2">Funding &amp; Partnerships</a>
    <ul>
    <li><a href="#how-is-the-project-funded" class="toc-header-h3">How is the project funded?</a></li>
    <li><a href="#will-the-project-accept-investment" class="toc-header-h3">Will the project accept investment?</a></li>
    <li><a href="#would-you-consider-an-official-partnership-with-other-businesses" class="toc-header-h3">Would you consider an official partnership with other businesses?</a></li>
    </ul>
</li>
<li><a href="#services" class="toc-header-h2">Services</a>
    <ul>
    <li><a href="#do-you-provide-an-official-managed-hosting-service" class="toc-header-h3">Do you provide an official managed hosting service?</a></li>
    <li><a href="#what-services-do-you-officially-provide" class="toc-header-h3">What services do you officially provide?</a></li>
    <li><a href="#are-there-other-versionseditions-of-bookstack" class="toc-header-h3">Are there other versions/editions of BookStack?</a></li>
    <li><a href="#can-others-provide-servicesofferings-for-bookstack" class="toc-header-h3">Can others provide services/offerings for BookStack?</a></li>
    <li><a href="#do-you-offer-pre-sales-supportcalls" class="toc-header-h3">Do you offer pre-sales support/calls?</a></li>
    </ul>
</li>
<li><a href="#communications--involvement" class="toc-header-h2">Communications &amp; Involvement</a>
    <ul>
    <li><a href="#how-can-we-receive-project-news--updates" class="toc-header-h3">How can we receive project news &amp; updates?</a></li>
    <li><a href="#how-can-we-contact-you" class="toc-header-h3">How can we contact you?</a></li>
    <li><a href="#how-can-i-get-involved-with-the-project" class="toc-header-h3">How can I get involved with the project?</a></li>
    <li><a href="#do-you-provide-mentoring" class="toc-header-h3">Do you provide mentoring?</a></li>
    </ul>
</li></ul>

<!-- <script type="module">
    // This is a dev script to just help automatically build out the TOC for this page.
    // You just need to uncomment this, copy the results from the console, that paste
    // back into the page.
    // Ensure you comment this back out though before commit.
    const headers = document.querySelectorAll('h2, h3');
    const toc = document.getElementById('toc');
    let list = null;
    for (const header of headers) {
        if (header.tagName === 'H2') {
            list = null;
        }
        const link = document.createElement('a');
        link.href=`#${header.id}`;
        link.textContent = header.textContent;
        link.classList.add('toc-header-' + header.tagName.toLowerCase());
        const li = document.createElement('li');
        li.append(link);

        if (list === null) {
            toc.append(li);
            list = document.createElement('ul');
            li.append(list);
        } else {
            list.append(li);
        }
    }

    console.log(toc.outerHTML);
</script> -->

---

## Origins, Goals & Organisation

### How did BookStack start?

[Dan Brown](https://danb.me/) started building BookStack in 2015 while looking for a documentation 
platform to use for his mixed-technical-skilled workplace.
Most service offerings incurred per-user costs, and most established open source offerings didn't 
quite hit the mark in terms of design & usability, at least out-of-the-box.
Therefore, with a few years' development experience, Dan thought he could whip up a solution that worked for his use-case.

The first few months involved a lot of design iteration as can be seen [in this blogpost](/blog/1-year-of-bookstack/).
Eventually the design, name, and hierarchy came together to form pretty much form the BookStack we know today.

The project was first officially outwardly announced [via the /r/selfhosted subreddit](https://www.reddit.com/r/selfhosted/comments/3z06rb/bookstack_a_free_wikilike_information_store/) which received fairly positive feedback.
BookStack remained published under the "Beta" status for a few years, until it was eventually [dropped in 2021](/blog/bookstack-release-v21-04/)
although little actually changed in regard to development and target stability, since stability had long been a core value.

### What are the core goals of BookStack?

BookStack aims to be an opinionated wiki system that provides a pleasant and simple out-of-the-box experience.
New users to an instance should find the experience intuitive and only basic word-processing skills should be
required to get involved in creating content on BookStack.
The platform should provide advanced power features to those that desire it but they should not interfere
with the core simple user experience.

BookStack aims to be free (both monetarily & in liberty) and open source, focusing on the core use-case
and audience that's it's built for instead of expanding to a wider, or more financially fruitful, audience.

BookStack aims to be "batteries-included", with core functionality designed to be built-in
rather than taking a more flexible plugin approach, to ensure the platform components
remain integrated & supported together.

In regard to development, BookStack aims for a relaxed, open, positive & stable approach.
The platform should evolve & improve in a steadily & stable manner over time, with a focus on
stability, maintainability and forward-compatibility instead of chasing new
features, technologies or audiences.

### Who works on BookStack?

The project is led by, and primarily maintained by, the creator [Dan Brown](https://danb.me/).
There are also a [significant amount](https://github.com/BookStackApp/BookStack/blob/development/.github/translators.txt)
of community members who work to translate the BookStack interface into many other languages.
Upon that, there are many other folks in our community that help with contributing code, reporting & managing issues, 
provide input, or just get involved within our communities.

Outside of the official project itself, there are many other satellite community projects and offerings, most of which all
support the core platform in some sort of way. These are things like user guides, systems to package BookStack
for other platforms, and API tools & libraries.
 
### How is work for the project organised?

BookStack is primarily organised via the [project on GitHub](https://github.com/BookStackApp/BookStack).
This is where the code is hosted, where code is contributed, and where the issue list is managed.
The issue list comprises of feature requests, bug reports, requests to contribute, requests for support, and more.
For managing translations, we use the [Crowdin platform](https://crowdin.com/project/bookstack) as a tool for this, 
which has automated syncs with the GitHub project.

Beyond those core development paths we also communicate, and take input from, our various communities
like the [BookStack discord server](https://discord.com/channels/578552496637739008/1060598935074381854)
and the [BookStack subreddit](https://www.reddit.com/r/BookStack/).

### What versions of BookStack do you support?

We only support the latest version of BookStack.
Usually every couple of months we release a "Feature Release", which can 
then be followed by patch (minor) versions to that feature release.
We don't look to patch older versions.

We don't have aim to have major big new releases that are painful to migrate to.
We instead try to retain a steady update pace, with a focus on avoiding breaking changes
and allowing easy forward compatibility, so that jumping to the latest version to keep
supported should not be a large concern.

### What license is the project provided under?

The BookStack source code is distributed under [the MIT license](https://github.com/BookStackApp/BookStack/blob/development/LICENSE).
This is an open source license which allows any type of use, modification, and distribution.
The only requirements are that you retain attribution to the project (it's license and copyright in particular)
in all copies or substantial portions of the Software.
This doesn't mean you have to keep our name/logo/link on your instance at all, you just need to meet the above
when sharing/re-distributing the code.

BookStack makes use of many other projects, either directly or indirectly, of which will have their own licenses and copyrights.
We ensure that the libraries used/included are under a license compatible with BookStack's MIT license.
Most of the directly used projects are [listed in our readme here](https://github.com/BookStackApp/BookStack/tree/development#-attribution).
BookStack uses the [npm](https://docs.npmjs.com/about-npm) and [composer](https://getcomposer.org/) dependency manager tools
which can be used to gain a full listing of used libraries.

---

## Feature Development

### How are features & additions decided upon?

We strongly focus on our existing user-base when deciding the path of development.
This often means improving existing features, and new features that work to our original core goals,
rather than adding new exciting shiny features that will get us a larger audience, user-base or income.

The project receives many requests with many different ideas, but over time we've learnt
that increasing the scope wider blurs the focus on our core goals while disproportionately 
impacting maintainability, which is a very important factor for a project like this.
Rather than putting in effort to make the platform suit new users, we instead put the
effort into making the platform better for the existing people it works well for.
This usually has a long-term affect of attracting new users anyway.

Ultimately, it's a balance of what's maintainable, what's in demand from our existing users,
and what fits the project's goals. The maintainability aspect is not just about code, 
but also the impact on long-term sustainability and the impact on community management & support. 

### Is feature X planned to be added?

Probably not is the most likely answer. If it hasn't been added by this point, there may not be the demand
for such a feature or there could be reasons it has not already been implemented.
You may be able to find prior request or history for the feature in [our issue list](https://github.com/BookStackApp/BookStack/issues?q=is%3Aissue).
Note though, if an issue is open that does not indicate intent to implement. 
A relaxed approach is taken to issues, allowing many to stay open to gain feedback, support or ideas.

### But feature X would be really simple to implement, why not just build it?

Adding almost any feature can be quite simple on its own.
It's very different matter to officially implement & support a feature on a longer-life, open source project like this.
Complexity often compounds, as we have to think: How does this fit in with other features? 
What about accessibility? What about forward compatibility? What about future plans? What about common customizations?
What about other languages? What about testing coverage? What about ease of hosting? What about RTL display?
What about community support impact? What about platform fit?...

Throwing new things in, to add to that complexity, is a route to a maintainability & sustainability nightmare.
It's much better we take time to assess and consider things, to meet our goals of steady & stable evolution.

### If a feature is not wanted, why not just add it as an option?

This often seems like an easy answer, but options can compound to impede future maintainability via complexity.
This isn't just about the code, but also about user experience complexity, and community support complexity.
Often there are better approaches, or the need for an option may point to a more fundamental need or problem.
Therefore we will strongly avoid adding new options (especially user-interface options) if possible.

For hackers, we do alternatively look to expose options for customization & hackery for those that really desire it, 
and have the skills to support their desires.

### Would BookStack integrate with X platform?

We focus on providing abstract APIs & methods where possible, or look to use widely accepted standards where it makes sense.
Generally we won't build to specific external platforms within the scope of the core project.
We do support a range of specific OAuth providers, but we've stopped expanding support for these,
aiming to use firmer standards or options for custom extension where desired.

If looking to build a custom integration for your instance, our [REST API](/docs/admin/hacking-bookstack/#bookstack-api) is a good place to start,
with [our api-scripts repository](https://github.com/BookStackApp/api-scripts) holding a range of 
examples in various languages.

### Can we pay for the implementation of specific features?

No. Money should not be a driver or incentive for decisions made for the core project.
Those without money should have as much influence in the evolution of the platform as those with money.
Additionally, the implementation of a feature is rarely the largest cost.
Maintenance & support has much more of an impact, and is a forever ongoing cost to the project.
We don't want to have additional financial incentives involved that may entice us to stretch the project out beyond a
reasonably maintainable state.

We get offered payment to build features often, and we have previously offered some quotes for features that had been validated
to meet the scope of the project via our core process, but it's usually a time consuming & awkward business dance to actually
get to an agreed scope and figure, so we've only had time consumed via this, and therefore has not been worth
the added complications or concerns.

### Can we get our own, or pay other, developers to contribute the features we want?

While we accept many code contributions we likely won't accept feature contributions unless you've opened
a line of discussion up with the project, and had BookStack maintainers confirm that an idea/scope would be accepted.
As touched on in the previous answer above, implementation is rarely the real cost of a new feature
and we don't want the direction of the platform to be directed by those with the most money (in this case,
those that are able to pay developers to implement the features they want).

It could seem like contributing the code for new features would be "doing the work for us", but quite often
it results in the core interesting coding logic being done, leaving us with testing, responsibility & maintenance long-term.
To be clear, we're happy to be getting others involved in contributing to the project, but we just don't like to have
feature contributions lead the direction & scope of the project.

---

## Funding & Partnerships

### How is the project funded?

The project is mainly funded through donations, sponsorships, and official support offerings.
Donations and sponsorships make up about half of the funding, with support offerings making up the other half,
although the support side is growing.

Details about donations can be found [on our donations page](/donate/).
Sponsorships are available at different levels via these donation methods, and gain your
companies' logo and link placed on our homepage and project readme.

Details about our support offerings can be found [on our support page](https://www.bookstackapp.com/support/).
These offerings, in addition to any other commercial offerings we may provide, 
are provided via a UK limited company, [HTTP Functions Ltd](https://www.httpfunctions.com/), which is led by the
creator and lead maintainer of BookStack, Dan.
Providing these via a company compartmentalises those commercial activities, while also somewhat insulating
from the core project itself from the influence of commercial users.

This funding currently helps cover Dan's living costs to keep working on the project as his main focus.
Ever so often we'll share insight into the project's finances on the blog, like can be seen 
[in our 2023 post here](/blog/bookstack-in-2023/).

### Will the project accept investment?

No. We do want money to become a core focus, goal, driver or concern for the project.
Investment is often in the desire for growth, gain and return.
This can put pressures on a project which can affect decisions and impede original goals.
We'd much rather be smaller and naturally grow steadily, as we believe that's better
long term for us and our users.

### Would you consider an official partnership with other businesses?

Typically not, especially for commercial offerings much for the reasons in the answer above,
and because most of these are somewhat exclusive and we try to remain neutral when it
comes to possible services/offerings/projects related to BookStack.

That said, there could be opportunity in some non-exclusive partnership and collaboration
with other companies where it doesn't have the mentioned impacts, especially with 
other "smaller" self-funded open source projects & businesses like ours.

---

## Services

### Do you provide an official managed hosting service?

We do not, and we don't intend to.
Many existing companies offer such services, and will have much better skills & capabilities to support
such a service. We instead take a position of being agnostic to hosting services, platforms and methods,
so we can keep focused on the core platform.

If interested in the services offered by others, you can find some options in 
the ["Other Hosting Options" part of our install page](https://www.bookstackapp.com/docs/admin/installation/#other)
otherwise [our sponsors](https://www.bookstackapp.com/#sponsors) are often hosting providers with BookStack
offerings, although none of these are officially vetted nor endorsed by the BookStack project.

### What services do you officially provide?

We provide support services which you can read about [on our support page](https://www.bookstackapp.com/support/).
In addition, we do provide services for updating "hacks" (unofficial & unsupported customizations) on our site.
These services are provided via [HTTP Functions Ltd](https://www.httpfunctions.com/).

### Are there other versions/editions of BookStack?

No, we don't provide custom, or enterprise versions of BookStack.
Our efforts are focused on a single, open and free version.
Official features should not be locked or limited unnecessarily.
There's no intent to change this.

### Can others provide services/offerings for BookStack?

Sure! Our license allows that, and we believe that more services and infrastructure
around the project is key to a healthy wider community and open source ecosystem.
There's no requirement to contribute or pay back, although it is appreciated.
I just ask the following:

- If you offer hosting services, please ensure you're able to keep customer instances reasonably up-to-date (or provide users the means to do so).
- Please don't infer an "official" affiliation, or misrepresent your relation, with the BookStack project in any way to users.
- You can use the name and logo to refer to BookStack, but please respect the "BookStack" trademark. For example, don't use it for other software, or use it in a way that could appear as an official BookStack service/offering, and don't use the logo by itself as your own logo.
- Please don't defer your customers to the BookStack community support offerings for things that should be managed/addressed at a infrastructure/hosting level (Basically don't overload our support with things you should be supporting).
- If forking the project, please do so cleanly with separate branding & community spaces to avoid confusion, conflation and impact to our limited resources. Also please respect the MIT license, and the licenses of the other components involved in the project & source code.

### Do you offer pre-sales support/calls?

No. These are usually desired by very large companies, and can often be very time consuming and non-productive
due to the abstract level of scale and business-specific process talked about.
We are not trying to sell you the software. It's free to take and assess as you need.

If pre-sales support or consultancy is essential, then our ["Enterprise Support Plan"](/support/) includes 
10 hours of video/call support & advice which could be used for this purpose.
Keep in mind, we will not make changes or add features to specifically "win your business".
Our enterprise plan offers no direct influence, development or custom build offering in regard
to new features and changes.

---

## Communications & Involvement

### How can we receive project news & updates?

The best route for this is [our blog](/blog/). On that page you'll find an RSS feed and a link to sign up
for blog updates by email. 
We also have a [security-specific update email list here](https://updates.bookstackapp.com/signup/bookstack-security-updates),
which will be sent upon release of new important security updates.

Otherwise, you can [find us on the fediverse/Mastodon here](https://fosstodon.org/@bookstack).
We also publish a range of update and guide videos, which can be found on both [Peertube](https://foss.video/c/bookstack/videos)
and [YouTube](https://www.youtube.com/c/BookStackApp).

### How can we contact you?

You can find us via any of the various communities we have:

- [On Mastodon](https://fosstodon.org/@bookstack)
- [Our Discord](https://discord.gg/ztkBqR2)
- [The Github Project](https://github.com/BookStackApp/BookStack)
- [Our Subreddit](https://www.reddit.com/r/bookstack)

If you need to get hold of Dan directly, he has links to his personal social pages [on his homepage](https://danb.me/).
His email can be seen [on his GitHub profile](https://github.com/ssddanbrown), when logged in.

### How can I get involved with the project?

You can join one of our communities and let us know!
We can then guide you to the right place or to any relevant existing documentation & guidance we might have.
It's not just about code either, there are many ways to help out. [See our blogpost here](/blog/contributing-to-open-source/)
about all the different ways you can get involved.

### Do you provide mentoring?

We don't provide any kind of official mentoring program.
That said, if you're wanting to contribute and put in the effort, we're happy to spend some time
to help guide and hand-hold through the development & contribution process.
It's rare there's anything easy and pre-accepted in the GitHub issue list to pick-up & work on,
but we can help find or put aside potential things to help with, depending on your goals
and skill-set.
