import React from 'react';

function Home() {
  return (
    <main id="content">
      <div className="container">
        <div className="title">
          <h3>
            Welcome to <strong>HateHire</strong>, where the work is as unique as you are!
          </h3>
        </div>
        <div className="customer-testimony">
          <h4>Customer Testimonies</h4>
        </div>
        <div className="grid-container">
          {[
            { text: "I hired HateHire for my ex’s wedding. Their subtle-yet-devastating presence ruined the vibe perfectly.", name: "Jessica, 28" },
            { text: "My coworker got an undeserved promotion, so I brought in HateHire to passive-aggressively roast them at every meeting. Worth every penny.", name: "Mike, 33" },
            { text: "HateHire helped me professionally despise my neighbor. Now, they mysteriously park a block away. Incredible results!", name: "Erin, 41" },
            { text: "I needed someone to roll their eyes at my cousin’s art exhibit. HateHire delivered. Masterful work.", name: "David, 29" },
            { text: "My high school rival was getting *too* successful. HateHire helped me bring them down a peg—discreetly, of course.", name: "Alex, 35" },
            { text: "HateHire made my enemy’s birthday party a **memorable** disaster. The whispered rumors alone? *Chef’s kiss.*", name: "Taylor, 30" },
            { text: "I just wanted someone to glare at my least favorite coworker during a work function. HateHire didn’t disappoint.", name: "Chris, 27" },
            { text: "Why confront someone yourself when you can outsource the disdain? HateHire gave my nemesis the side-eye of a lifetime.", name: "Vanessa, 32" },
            { text: "I hired HateHire for a wedding where I wasn’t the Maid of Honor. Let’s just say… no one will forget the ‘technical difficulties’ anytime soon.", name: "Rachel, 29" }
          ].map((testimonial, index) => (
            <div className="card p-3" key={index}>
              <p>{`"${testimonial.text}"`}</p>
              <p><strong>~ {testimonial.name}</strong></p>
            </div>
          ))}
        </div>
      </div>
    </main>
  );
}

export default Home;